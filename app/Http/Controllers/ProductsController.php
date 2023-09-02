<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['products'] = Product::all();
        return view('product.products', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Category Model selectForArray Function
        $this->data['categories'] = Category::arrayForSelect();
        $this->data['headline'] = "Add New Product";

        return view('product.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $formData = $request->all();

        if (Product::create($formData)) {
            Session::flash('message', 'Data Insert Successfully!');
        }
        
        return redirect()->to('products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->data['products'] = Product::find($id);
        return view('product.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->data['categories']   = Category::arrayForSelect();
        $this->data['products']     = Product::findOrFail($id);
        $this->data['headline']     = "Update Information";
        return view('product.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        $data = $request->all();
        $products = Product::find($id);
        $products->category_id = $data['category_id'];
        $products->title = $data['title'];
        $products->description = $data['description'];
        $products->cost_price = $data['cost_price'];
        $products->price = $data['price'];

        if( $products->save() ) {
            Session::flash('message', 'Data Update Successfully!');
        }

        return redirect()->to('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::find($id);
        if( $products->delete() ) {
            Session::flash('message', $products->title . ' Delete Successfully!');
        }
        return redirect()->to('products');
    }
}
