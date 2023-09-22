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
                            <th>Data Collect By</th>
                            <th>Amount</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Note</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-right">Total Amount: </th>
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
                                <td> {{ optional($payment->admin)->name }} </td>
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

@endsection
