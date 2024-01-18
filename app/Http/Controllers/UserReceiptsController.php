<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptRequest;
use App\Models\Receipt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserReceiptsController extends Controller
{
    // Active Nav
    public function __construct()
    {
        $this->data['tab_menu'] = 'receipts';
    }

    // Receipts
    public function index( $id ) {
        $this->data['users'] = User::findOrFail( $id );
        return view('users.receipts.receipt', $this->data);
    }
    

    // Receipt Store
    public function store( ReceiptRequest $request, $user_id, $invoice_id = null) {
        $formData               = $request->all();
        $formData['user_id']    = $user_id;
        $formData['admin_id']   = Auth::id();

        // Optional Sale Invoice Id 
        if( $invoice_id ) {
            $formData['sale_invoice_id'] = $invoice_id;
        }

        if( Receipt::create($formData) ) {
            Session::flash('message', 'Receipt Added Successfully!');

            // Optional Sale Invoice Id Location
            if( $invoice_id ) {
                return redirect()->route('users.sales.invoices_details', ['id' => $user_id, 'invoice_id' => $invoice_id]);
            } else {
                return redirect()->route('user.receipts', ['id' => $user_id]);
            }
        }

    }

    // Delete Function
    public function destroy( $user_id, $receipt_id ) {
        if( Receipt::destroy( $receipt_id ) ) {
            Session::flash('message', 'Receipt Data Delete Successfully!');
            return redirect()->route('user.receipts', ['id' => $user_id]);
        }
    }

}
