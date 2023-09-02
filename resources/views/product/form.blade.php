@extends('layout.main')

@section('main_content')

    @if ( $errors -> any() )
        <div class="div">
            <ul>
                @foreach ($errors -> all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>    
        </div>    
    @endif
    
<div class="row clear-fix">
  <div class="col-md-6">
    <h2>{{ $headline }}</h2>
  </div>
  <div class="col-md-6 text-right">
    <a href="{{ route('products.index') }}" class="btn btn-info">Products List</a>
  </div>
</div>


     <!-- DataTales Example -->
     <div class="card shadow mb-4">
      
      @if ( isset( $products ) )
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Product</h6>
    </div>
    @else
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Add New Product</h6>
  </div>
      @endif

        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                  @if (isset($products))
                  {!! Form::model($products, ['route' => ['products.update', $products->id], 'method' => 'put']) !!}

                      @else
                      {!! Form::open(['route' => 'products.store', 'method' => 'post']) !!}

                      @endif

                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="categoryId" class="col-form-group">Category<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-9">
                              {{ Form::select('category_id', $categories, null, [ 'placeholder' => 'Select Category', 'class' => 'form-control', 'id' => 'categoryId' ]) }}
                            </div>
                          </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                {{ Form::label('productTitle', 'Title', [ 'class' => 'col-form-label' ]); }}
                            </div>
                            <div class="col-sm-9">
                              {{ Form::text( 'title',  NULL,  [ 'class' => 'form-control', 'id' => 'productTitle', 'placeholder' => 'Title'] ) }}
                            </div>
                          </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                {{ Form::label('description', 'Description', [ 'class' => 'col-form-label' ]); }}
                            </div>
                            <div class="col-sm-9">
                              {{ Form::textarea( 'description',  NULL,  [ 'class' => 'form-control', 'id' => 'description', 'placeholder' => 'Description'] ) }}
                            </div>
                          </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                {{ Form::label('cost_price', 'Cost Price', [ 'class' => 'col-form-label' ]); }}
                            </div>
                            <div class="col-sm-9">
                              {{ Form::number( 'cost_price',  NULL,  [ 'class' => 'form-control', 'id' => 'cost_price', 'placeholder' => 'Cost Price'] ) }}
                            </div>
                          </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                {{ Form::label('salePrice', 'Sale Price', [ 'class' => 'col-form-label' ]); }}
                            </div>
                            <div class="col-sm-9">
                              {{ Form::number( 'price',  NULL,  [ 'class' => 'form-control', 'id' => 'salePrice', 'placeholder' => 'Sale Price'] ) }}
                            </div>
                          </div>

                        <div class="mt-3 text-right">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>

                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>  
@endsection