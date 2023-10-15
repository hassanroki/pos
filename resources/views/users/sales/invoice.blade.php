@extends('users.users_layout')

@section('users_content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sale Invoices Details
            </h6>
        </div>

        <div class="card-body">
            <div class="row justify-content-md-center">

                <div class="col-md-6">
                    <div><strong>Customer: </strong>{{ $users->name }}</div>
                    <div><strong>Email: </strong>{{ $users->email }}</div>
                    <div><strong>Phone: </strong>{{ $users->phone }}</div>
                </div>

                <div class="col-md-3"></div>

                <div class="col-md-3">
                    <div><strong>Challan Nubmer: </strong>{{ $invoice->challan_no }}</div>
                    <div><strong>Date: </strong>{{ $invoice->date }}</div>
                    <div><strong>Note: </strong>{{ $invoice->note }}</div>
                </div>
                
            </div>
            <div class="invoice-item my-5">
                <table class="table table-bordered">
                    <thead>
                        <th>SL</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($invoice->item as $key => $item )
                            <tr>
                                <td> {{ $key+1 }} </td>
                                <td>{{ $item->product->title }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->total }}</td>
                                <td class="text-right">
                                    <form action="{{ route('users.sales.delete_item', ['id' => $users->id, 'invoice_id' => $invoice->id, 'item_id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning"
                                            onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <th></th>
                        <th><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#newProduct"><i class="fa fa-plus"> Add Product</i></button></th>
                        <th colspan="2">Total</th>
                        <th colspan="2">{{ $invoice->item()->sum('total') }}</th>
                    </tfoot>
                </table>
            </div>

        </div>

    </div>


    <!-- Modal Add New Product-->
    <div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="newProductLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            {!! Form::open(['route' => ['users.sales.add_item', ['id' => $users->id, 'invoices_id' => $invoice->id]], 'method' => 'post']) !!}

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newPaymentLabel">New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <div class="col-sm-3">
                            {{ Form::label('product', 'Product', ['class' => 'col-form-label']) }}
                        </div>
                        <div class="col-sm-9">
                            {{ Form::select('product_id', $product, null, ['class' => 'form-control', 'id' => 'product', 'placeholder' => 'Select Product', 'required']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            {{ Form::label('price', 'Unit Price', ['class' => 'col-form-label']) }}
                        </div>
                        <div class="col-sm-9">
                            {{ Form::number('price', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Enter Unit Price', 'required']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            {{ Form::label('quantity', 'Quantity', ['class' => 'col-form-label']) }}
                        </div>
                        <div class="col-sm-9">
                            {{ Form::number('quantity', null, ['class' => 'form-control', 'id' => 'quantity', 'placeholder' => 'Enter Quantity', 'required']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            {{ Form::label('total', 'Total Price', ['class' => 'col-form-label']) }}
                        </div>
                        <div class="col-sm-9">
                            {{ Form::number('total', null, ['class' => 'form-control', 'id' => 'total', 'placeholder' => 'Total Price', 'required']) }}
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
