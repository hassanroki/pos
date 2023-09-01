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
    <a href="{{ route('categories.index') }}" class="btn btn-info">Category List</a>
  </div>
</div>


     <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if (isset($mode))
            <h6 class="m-0 font-weight-bold text-primary">Update Category</h6>
            @else
            <h6 class="m-0 font-weight-bold text-primary">New Categories</h6>
            @endif
        </div>
    </div>

        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    @if ( isset($categories) )
                    {!! Form::model($categories, ['route' => ['categories.update', $categories->id], 'method' => 'put']) !!}
                    @else
                    {!! Form::open(['route' => 'categories.store', 'method' => 'post']) !!}
                    @endif
                        <div class="form-group row">
                            <div class="col-sm-3">
                                {{ Form::label('title', 'Title', [ 'class' => 'col-form-label' ]); }}
                            </div>
                            <div class="col-sm-9">
                              {{ Form::text( 'title',  NULL,  [ 'class' => 'form-control', 'id' => 'title', 'placeholder' => 'Title'] ) }}
                              <span>{{ $errors->first('title') }}</span>
                            </div>
                          </div>

                        <div class="mt-3 text-right">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>

                        {!! Form::close() !!}
                </div>
            </div>
        </div> 
@endsection