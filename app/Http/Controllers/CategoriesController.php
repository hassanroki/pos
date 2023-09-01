<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['categories'] = Category::all();
        return view('categories.categories', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['headline'] = "Add New Categories";
        return view('categories.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $formData = $request->all();
        if( Category::create( $formData ) ) {
            Session::flash('message', $formData['title'] . ' ' . 'Category Added Successfully!');
        }

        return redirect()->to('categories');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['categories'] = Category::findOrFail($id);
        $this->data['headline'] = "Update Category";
        $this->data['mode'] = "edit";
        return view('categories.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category           = Category::find($id);
        $category->title  = $request->get('title');

        if( $category->save() ) {
            Session::flash('message', $category->title . ' Category Update Successfully!');
        }

        return redirect()->to('categories');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if( Category::find($id)->delete() ) {
            Session::flash('message', 'Category Data Deleted!');
        }

        return redirect()->to('categories');
    }
}
