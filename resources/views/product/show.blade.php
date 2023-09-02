@extends('layout.main');

@section('main_content');
<div class="row mb-3">
    <div class="col-md-2 text-left">
        <a href="{{ route('products.index') }}" class="btn btn-info"><i class="fa fa-arrow-left"> Back</i></a>
    </div>
    <div class="col-md-10 text-right">
        <a href="{{ route('products.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> New Sale</a>
        <a href="{{ route('products.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> New Purchases</a>
        <a href="{{ route('products.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> New Payment</a>
        <a href="{{ route('products.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> New Receipt</a>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><strong>{{ $products->title }}</strong> Infromations</h6>
    </div>
    <div class="card-body">
        
<div class="row justify-content-md-center">
<div class="col-md-12">
    <table class="table table-striped table-borderless">
            <tr>
                <th class="text-right">Product :</th>
                <td> {{ $products->category->title; }} </td>
            </tr>
            <tr>
                <th class="text-right">Title :</th>
                <td> {{ $products->title; }} </td>
            </tr>
            <tr>
                <th class="text-right">Descrption:</th>
                <td> {{ $products->description; }} </td>
            </tr>
            <tr>
                <th class="text-right">Cost Price :</th>
                <td> {{ $products->cost_price; }} </td>
            </tr>
            <tr>
                <th class="text-right">Sale Price :</th>
                <td> {{ $products->price; }} </td>
            </tr>
    </table>
</div>
</div>

    </div>
</div> 
@endsection