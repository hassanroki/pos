<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this -> data['users'] = User::all();
        return view('users.users', $this -> data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Groups Model to Data Collect
        $this -> data['groups']     = Group::arrayForSelect();
        $this->data['headline']     = "Add New User";


        return view('users.form', $this -> data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $formData = $request -> all();
        if( User::create( $formData ) ) {
            Session::flash('message', 'User Create Successfully!');
        }
        return redirect() -> to ('users');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['groups']       = Group::arrayForSelect();
        $this->data['users']        = User::findOrFail( $id );
        $this->data['headline']     = "Update Information";
        return view('users.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $data           = $request->all();
        $user           = User::find($id);
        $user->group_id = $data['group_id'];
        $user->name     = $data['name'];
        $user->email    = $data['email'];
        $user->phone    = $data['phone'];
        $user->address  = $data['address'];

        if( $user->save() ) {
            Session::flash('message', 'User Updated Successfully!');
        }
        return redirect() -> to ('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if( User::find($id)->delete() ) {
            Session::flash('message', 'User Deleted Successfully!');
        }
        return redirect() -> to ('users');
    }
}
