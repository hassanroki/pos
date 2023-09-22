@extends('layout.main');

@section('main_content')
    <div class="row mb-3">
        <div class="col-md-2 text-left">
            <a href="{{ route('users.index') }}" class="btn btn-info"><i class="fa fa-arrow-left"> Back</i></a>
        </div>
        <div class="col-md-10 text-right">
            <a href="{{ route('users.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> New Sale</a>
            <a href="{{ route('users.create') }}" class="btn btn-info"><i class="fa fa-plus"></i> New Purchases</a>

            <!-- Button trigger modal Payment -->
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment">
                <i class="fa fa-plus"></i> New Payement
            </button>

            <!-- Button trigger modal Receipt -->
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newReceipt">
                <i class="fa fa-plus"></i> New Receipt
            </button>


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



    <!-- Modal New Payment-->
    <div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="newPaymentLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            {!! Form::open(['route' => ['users.payments.store', $users->id], 'method' => 'post']) !!}

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newPaymentLabel">New Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <div class="col-sm-3">
                            {{ Form::label('amount', 'Amount', ['class' => 'col-form-label']) }}
                        </div>
                        <div class="col-sm-9">
                            {{ Form::number('amount', null, ['class' => 'form-control', 'id' => 'amount', 'placeholder' => 'Enter Amount', 'required']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            {{ Form::label('paymentDate', 'Date', ['class' => 'col-form-label']) }}
                        </div>
                        <div class="col-sm-9">
                            {{ Form::date('date', null, ['class' => 'form-control', 'id' => 'paymentDate', 'required']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            {{ Form::label('commentNote', 'Note', ['class' => 'col-form-label']) }}
                        </div>
                        <div class="col-sm-9">
                            {{ Form::textarea('note', null, ['class' => 'form-control', 'id' => 'commentNote', 'rows' => '3', 'placeholder' => 'Note']) }}
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <div class="text-right">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>

                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

    <!-- Modal New Receipt -->
    <div class="modal fade" id="newReceipt" tabindex="-1" role="dialog" aria-labelledby="newReceipt"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            {!! Form::open(['route' => ['users.receipts.store', $users->id], 'method' => 'post']) !!}

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newReceipt">New Receipt</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <div class="col-sm-3">
                            {{ Form::label('amountId', 'Amount', ['class' => 'col-form-label']) }}
                        </div>
                        <div class="col-sm-9">
                            {{ Form::number('amount', null, ['class' => 'form-control', 'id' => 'amountId', 'placeholder' => 'Enter Amount', 'required']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            {{ Form::label('receiptDate', 'Date', ['class' => 'col-form-label']) }}
                        </div>
                        <div class="col-sm-9">
                            {{ Form::date('date', null, ['class' => 'form-control', 'id' => 'receiptDate', 'required']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            {{ Form::label('commentNote', 'Note', ['class' => 'col-form-label']) }}
                        </div>
                        <div class="col-sm-9">
                            {{ Form::textarea('note', null, ['class' => 'form-control', 'id' => 'commentNote', 'rows' => '3', 'placeholder' => 'Note']) }}
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <div class="text-right">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>

                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
