@extends('layout.main');

@section('main_content')
    <div class="row mb-3">
        <div class="col-md-2 text-left">
            <a href="{{ route('users.index') }}" class="btn btn-info"><i class="fa fa-arrow-left"> Back</i></a>
        </div>
        <div class="col-md-10 text-right">

            {{-- Button Trigal Modal Sale --}}
            <button class="btn btn-info" data-toggle="modal" data-target="#newSale"><i class="fa fa-plus"></i> New Sale</button>

            {{-- Button Trigal Modal --}}
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
    <div class="modal fade" id="newReceipt" tabindex="-1" role="dialog" aria-labelledby="newReceipt" aria-hidden="true">
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


    <!-- Modal New Sale -->
    <div class="modal fade" id="newSale" tabindex="-1" role="dialog" aria-labelledby="newSale" aria-hidden="true">
        <div class="modal-dialog" role="document">

            {!! Form::open(['route' => ['users.sales.store', $users->id], 'method' => 'post']) !!}

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newReceipt">New Sale</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <div class="col-sm-3">
                            {{ Form::label('challanNo', 'Challan Number', ['class' => 'col-form-label']) }}
                        </div>
                        <div class="col-sm-9">
                            {{ Form::number('challan_no', null, ['class' => 'form-control', 'id' => 'challanNo', 'placeholder' => 'Enter Challan No']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            {{ Form::label('saleDate', 'Date', ['class' => 'col-form-label']) }}
                        </div>
                        <div class="col-sm-9">
                            {{ Form::date('date', null, ['class' => 'form-control', 'id' => 'saleDate', 'required']) }}
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

    @include('users.user_layout_content');
@endsection
