<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $products = Product::available()->get();
        return view('index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function showCreateProductForm() {
        return view('product_create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
    public function storeProduct(ProductRequest $request) {
        Product::create([
            'art' => $request->art,
            'name' => $request->name,
            'data'=> $request->data,
        ]);

        return redirect()->route('main');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the product
     *
     * 
     */
    public function showEditProductForm(Product $product)
    {
        return view('product_edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     *
     */
    public function updateProduct(ProductRequest $request, Product $product) {
        $product->update([
            'name' => $request->name,
            'art' => $request->art,
            'status' => $request->status,
            'data' => $request->data,
        ]);

        return redirect()->route('main');
    }

    /**
     * Show the form for deleting the product
     * 
     * 
     */
    public function showDeleteFormProduct(Product $product) {
        return view('product_delete', ['product' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('main');
    }
}
