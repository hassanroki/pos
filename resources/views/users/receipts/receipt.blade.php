@extends('users.users_layout');

@section('users_content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Receipts of <strong>{{ $users->name }}</strong>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Receipt Id</th>
                            <th>Collect By</th>
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
                            <th colspan="5">{{ $users->receipts->sum('amount'); }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @foreach ($users->receipts as $receipt)
                            <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{ $receipt->id }} </td>
                                <td> {{ optional($receipt->admin)->name }} </td>
                                <td> {{ $receipt->amount }} </td>
                                <td> {{ $users->name }} </td>
                                <td> {{ $receipt->date }} </td>
                                <td> {{ $receipt->note }} </td>
                                <td class="text-right">
                                    <form action="{{ route('users.receipts.destroy', ['id' => $users->id, 'receipt_id' => $receipt->id]) }}" method="POST">
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
