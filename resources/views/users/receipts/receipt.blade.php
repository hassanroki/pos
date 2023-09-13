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
                            <th>Amount</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Note</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>SL</th>
                            <th>Receipt Id</th>
                            <th>Amount</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Note</th>
                            <th class="text-right">Actions</th>
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
                                <td> {{ $receipt->amount }} </td>
                                <td> {{ $users->name }} </td>
                                <td> {{ $receipt->date }} </td>
                                <td> {{ $receipt->note }} </td>
                                <td class="text-right">
                                    <form action="{{ route('users.destroy', ['user' => $users->id]) }}" method="POST">
                                        <a href="{{ route('users.show', ['user' => $users->id]) }}"
                                            class="btn btn-danger"><i class="fa fa-eye"></i></a>

                                        <a href="{{ route('users.edit', ['user' => $users->id]) }}"
                                            class="btn btn-danger"><i class="fa fa-edit"></i></a>

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
