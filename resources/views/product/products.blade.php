@extends('layout.main');

@section('main_content')
<div class="row clear-fix">
    <div class="col-md-6">
        <h2>Products List</h2>
    </div>
    <div class="col-md-6 text-right page_header">
        <a href="{{ url('products/create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Create New Product</a>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Products</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categories</th>
                        <th>Title</th>
                        <th>Cost Price</th>
                        <th>Sale Price</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Categories</th>
                        <th>Title</th>
                        <th>Cost Price</th>
                        <th>Sale Price</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td> {{ $product -> id }} </td>
                        <td> {{ $product->category->title }} </td>
                        <td> {{ $product -> title }} </td>
                        <td> {{ $product -> cost_price }} </td>
                        <td> {{ $product -> price }} </td>
                        <td class="text-right">
                            <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST">
                                <a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn btn-danger"><i class="fa fa-eye"></i></a>

                                <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-danger"><i class="fa fa-edit"></i></a>

                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 
@endsection