@extends('users.users_layout')

@section('users_content')

<div class="row">
    <!-- Total Sales -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Sales</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                                $total = 0;
                                foreach( $users->purchases as $purchase ) {
                                    $total += $purchase->item()->sum('total');
                                }
                                echo $total;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Purchases -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                           Total Purchases</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                                $total = 0;
                                foreach ($users->sales as $sale) {
                                    $total += $sale->item()->sum('total');
                                }
                                echo $total;    
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Receipts -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Receipts</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users->receipts()->sum('amount') }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Total Payments -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Receipts</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users->payments()->sum('amount') }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
