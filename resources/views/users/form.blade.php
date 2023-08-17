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
    <a href="{{ url('users') }}" class="btn btn-info">Users List</a>
  </div>
</div>


     <!-- DataTales Example -->
     <div class="card shadow mb-4">
      
      @if ( isset( $users ) )
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update User</h6>
    </div>
    @else
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">New User</h6>
  </div>
      @endif

        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                  @if (isset($users))
                  {!! Form::model($users, ['route' => ['users.update', $users->id], 'method' => 'put']) !!}

                      @else
                      {!! Form::open(['route' => 'users.store', 'method' => 'post']) !!}

                      @endif

                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label for="userGroup" class="col-form-group">User Group <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-9">
                              {{ Form::select('group_id', $groups, null, [ 'placeholder' => 'Select Group', 'class' => 'form-control', 'id' => 'userGroup' ]) }}
                            </div>
                          </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                {{ Form::label('userName', 'Name', [ 'class' => 'col-form-label' ]); }}
                            </div>
                            <div class="col-sm-9">
                              {{ Form::text( 'name',  NULL,  [ 'class' => 'form-control', 'id' => 'userName', 'placeholder' => 'Name'] ) }}
                            </div>
                          </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                {{ Form::label('userEmail', 'Email', [ 'class' => 'col-form-label' ]); }}
                            </div>
                            <div class="col-sm-9">
                              {{ Form::email( 'email',  NULL,  [ 'class' => 'form-control', 'id' => 'userEmail', 'placeholder' => 'Email'] ) }}
                            </div>
                          </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                {{ Form::label('userPhone', 'Phone', [ 'class' => 'col-form-label' ]); }}
                            </div>
                            <div class="col-sm-9">
                              {{ Form::number( 'phone',  NULL,  [ 'class' => 'form-control', 'id' => 'userPhone', 'placeholder' => 'Phone'] ) }}
                            </div>
                          </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                {{ Form::label('address', 'Address', [ 'class' => 'col-form-label' ]); }}
                            </div>
                            <div class="col-sm-9">
                              {{ Form::text( 'address',  NULL,  [ 'class' => 'form-control', 'id' => 'address', 'placeholder' => 'Address'] ) }}
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