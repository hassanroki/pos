@extends('layout.main')

@section('main_content')
    
<div class="row clearfix">
    <div class="col-md-6">
        <h2>Categories List</h2>
    </div>
    <div class="col-md-6 page_header text-right">
        <a href="{{ route('categories.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> Create Categories</a>
    </div>
</div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td> {{ $category -> id }} </td>
                                <td> {{ $category -> title }} </td>
                                <td class="text-right">
                                    <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('categories.edit', ['category' => $category -> id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
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