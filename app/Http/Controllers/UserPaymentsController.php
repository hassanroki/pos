<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserPaymentsController extends Controller
{
    // Active Nav
    public function __construct()
    {
        $this->data['tab_menu'] = 'payments';
    }

    // Payments
    public function index( $id ) {
        $this->data['users'] = User::findOrFail( $id );
        return view('users.payments.payment', $this->data);
    }

    // Request
    public function store( PaymentRequest $request, $user_id )
    {
        $formData = $request->all();
        $formData['user_id']    = $user_id;
        $formData['admin_id']   = Auth::id();

        if( Payment::create($formData) ) {
            Session::flash('message', 'Payment Added Successfully!');
            return redirect()->route('user.payments', [ 'id' => $user_id]);
        }
    }

    // Destroy
    public function destroy( $user_id, $payment_id ) {
        if( Payment::destroy($payment_id) ) {
            Session::flash('message', 'Payment Data Deleted Successfully!');
        }
        return redirect()->route('user.payments', ['id' => $user_id]);
    }

}
