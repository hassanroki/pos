@extends('users.users_layout');

@section('users_content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sales of <strong>{{ $users->name }}</strong>
            </h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Collect By</th>
                            <th>Challan No</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $totalItem      = 0;
                            $grandTotal    = 0;    
                        ?>
                        @foreach ($users->sales as $sale)
                            <tr>
                                <td> {{ optional($sale->admin)->name }} </td>
                                <td> {{ $sale->challan_no }} </td>
                                <td> {{ $sale->date }} </td>
                                <td>
                                    <?php
                                        $totalQty     = $sale->item()->sum('quantity');
                                        $totalItem    += $totalQty;
                                        echo $totalQty;   
                                    ?>
                                </td>
                                <td> 
                                    <?php
                                        $totalQty   = $sale->item()->sum('total');
                                        $grandTotal += $totalQty;
                                        echo $totalQty;
                                    ?>
                                </td>
                                <td class="text-right">
                                    <form action="{{ route('users.sales.destroy', ['id' => $users->id, 'invoice_id' => $sale->id]) }}" method="POST">
                                        <a href="{{ route('users.sales.invoices_details', ['id' => $users->id, 'invoice_id' => $sale->id]) }}"
                                            class="btn btn-danger"><i class="fa fa-eye"></i>
                                        </a>
                                        @if ( $totalQty == 0 )
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning"
                                            onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Collect By</th>
                            <th>Challan No</th>
                            <th>Date</th>
                            <th>{{ $totalItem }}</th>
                            <th>{{ $grandTotal }}</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
@endsection
