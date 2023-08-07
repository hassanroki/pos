@extends('layout.main')

@section('main_content')
    <h2>Create New Group</h2>
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Group</h6>
        </div>
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <form class="form" method="POST" action="{{ url('/groups') }}">
                        @csrf
                        <div class="mt-3">
                            <label for="title" class="form-label" name="title">Users Groups Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Groups Title">
                            <small class="form-text text-muted" id="helpTitle">Title of users groups</small>
                        </div>
                        <div class="mt-3">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
@endsection