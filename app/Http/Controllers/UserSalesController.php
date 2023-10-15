<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceProductRequest;
use App\Http\Requests\SaleRequest;
use App\Models\Product;
use App\Models\SaleInvoice;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserSalesController extends Controller
{
    public function __construct()
    {
        $this->data['tab_menu'] = 'sales';
    }

    // Index
    public function index( $id ) {
        $this->data['users']            = User::findOrFail($id);
        return view('users.sales.sale', $this->data);
    }

    // Store
    public function store( SaleRequest $request, $user_id) {
        $formData               = $request->all();
        $formData['user_id']    = $user_id;
        $formData['admin_id']   = Auth::id();

        if( SaleInvoice::create($formData) ) {
            Session::flash('message', 'New Sale Added Successfully!');
        }
        return redirect()->route('user.sales', ['id' => $user_id]);
    }

    // View
    public function invoice( $user_id, $invoice_id ) {
        $this->data['users']            = User::findOrFail($user_id);
        $this->data['invoice']          = SaleInvoice::findOrFail($invoice_id);
        $this->data['product']          = Product::arrayForSelect();
        return view('users.sales.invoice', $this->data);
    }

    // Delete Sale Invoice
    public function destroy( $user_id, $invoice_id ) {
        if( SaleInvoice::destroy($invoice_id)) {
            Session::flash('message', 'Invoice Delete Successfully!');
        }
        return redirect()->route('user.sales', ['id' => $user_id]);
    }

    // Add New Sale Item
    public function addItem( InvoiceProductRequest $request, $user_id, $invoices_id) {
        $formData = $request->all();
        $formData['sale_invoice_id'] = $invoices_id;

        if( SaleItem::create($formData)) {
            Session::flash('message', 'Item Added Successfully!');
        }
        return redirect()->route('users.sales.invoices_details', ['id' => $user_id, 'invoice_id' => $invoices_id]);
    }

    // Delete Sale Item
    public function destroyItem( $user_id, $invoice_id, $item_id ) {
        if( SaleItem::destroy($item_id) ) {
            Session::flash('message', 'Item Deleted Successfully!');
        }
        return redirect()->route('users.sales.invoices_details', ['id' => $user_id, 'invoice_id' => $invoice_id]);
    }

}
