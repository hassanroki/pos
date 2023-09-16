@extends('layout.main');

@section('main_content')
    <div class="row mb-3">
        <div class="col-md-2 text-left">
            <a href="{{ route('users.index') }}" class="btn btn-info"><i class="fa fa-arrow-left"> Back</i></a>
        </div>
        <div class="col-md-10 text-right">
            <a href="{{ route('users.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> New Sale</a>
            <a href="{{ route('users.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> New Purchases</a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment">
                <i class="fa fa-plus"></i> New Payement
            </button>

            <a href="{{ route('users.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> New Receipt</a>
        </div>
    </div>

    <div class="row clearfix mt-5">
        <div class="col-md-2">
            <div class="nav flex-column nav-pills">

                <a class="nav-link @if ($tab_menu === 'user_info') active @endif "
                    href="{{ route('users.show', $users->id) }}">User Info</a>

                <a class="nav-link @if ($tab_menu === 'sales') active @endif "
                    href="{{ route('user.sales', $users->id) }}">Sales</a>

                <a class="nav-link @if ($tab_menu === 'purchases') active @endif "
                    href="{{ route('user.purchases', $users->id) }}">Purchases</a>

                <a class="nav-link  @if ($tab_menu === 'payments') active @endif "
                    href="{{ route('user.payments', $users->id) }}">Payments</a>

                <a class="nav-link  @if ($tab_menu === 'receipts') active @endif "
                    href="{{ route('user.receipts', $users->id) }}">Receipts</a>
            </div>
        </div>

        <div class="col-md-10">

            @yield('users_content');

        </div>

    </div>
@endsection
