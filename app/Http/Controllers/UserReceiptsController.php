<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
