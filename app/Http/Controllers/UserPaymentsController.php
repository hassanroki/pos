<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
