@extends('users.users_layout');

@section('users_content')

    @if ($errors->any())
        <div class="div">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Purchases of <strong>{{ $users->name }}</strong>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Payment Id</th>
                            <th>Amount</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Note</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="2" class="text-right">Total Amount: </th>
                            <th class="text-left" colspan="5"> {{ $users->payments->sum('amount') }} </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @foreach ($users->payments as $payment)
                            <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{ $payment->id }} </td>
                                <td> {{ $payment->amount }} </td>
                                <td> {{ $users->name }} </td>
                                <td> {{ $payment->date }} </td>
                                <td> {{ $payment->note }} </td>
                                <td class="text-right">
                                    <form
                                        action="{{ route('users.payments.destroy', ['id' => $users->id, 'payment_id' => $payment->id]) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning"
                                            onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="newPaymentLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            {!! Form::open(['route' => ['users.payments.store', $users->id], 'method' => 'post']) !!}

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newPaymentLabel">Modal title</h5>
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

@endsection
