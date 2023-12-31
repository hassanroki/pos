@extends('users.users_layout')

@section('users_content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{ $users->name }}</strong> Infromations
            </h6>
        </div>

        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <table class="table table-striped table-borderless">
                        <tr>
                            <th class="text-right">Group :</th>
                            <td> {{ $users->group->title }} </td>
                        </tr>
                        <tr>
                            <th class="text-right">Name :</th>
                            <td> {{ $users->name }} </td>
                        </tr>
                        <tr>
                            <th class="text-right">Email :</th>
                            <td> {{ $users->email }} </td>
                        </tr>
                        <tr>
                            <th class="text-right">Phone :</th>
                            <td> {{ $users->phone }} </td>
                        </tr>
                        <tr>
                            <th class="text-right">Address :</th>
                            <td> {{ $users->address }} </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
