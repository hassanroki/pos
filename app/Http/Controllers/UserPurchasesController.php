<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPurchasesController extends Controller
{
    // Active Nav
    public function __construct()
    {
        $this->data['tab_menu'] = 'purchases';
    }

    // Purchases Index
    public function index( $id ) {
        $this->data['users'] = User::findOrFail( $id );
        return view('users.purchases.purchase', $this->data);
    }
}
