<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\Services\FileHandler;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', 'waiting')->paginate(6);

        return view('pages.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.products.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $imageToStore = FileHandler::validateFile($request);

        //Insert and save values to the database using the Model
        $product = new Product();
        $product->name = $request->input('productName');
        $product->type = $request->input('productCategory');
        $product->parts = $request->input('productParts');
        $product->selling_price = $request->input('productPrice');
        $product->material_cost = $request->input('productCost');
        $product->cost_per_part = round($request->input('productCost') / $request->input('productParts'));
        $product->build_time = $request->input('productBuildTime');        
        $product->img = $imageToStore;
        $product->save();

        return redirect("/product/create")->with('success', 'Product added successfuly');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ProductRequest  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $imageToStore = FileHandler::validateFile($request);

        //Insert and save values to the database using the Model
        $product->name = $request->input('productName');
        $product->type = $request->input('productCategory');
        $product->parts = $request->input('productParts');
        $product->selling_price = $request->input('productPrice');
        $product->material_cost = $request->input('productCost');
        $product->cost_per_part = ($request->input('productCost') / $request->input('productParts'));
        $product->build_time = $request->input('productBuildTime');
        
        FileHandler::deleteOldFile($product);

        $product->img = $imageToStore;
        $product->save();

        return redirect("/home")->with('success', 'Product updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product != null || $product != false) {
            FileHandler::deleteOldFile($product);
            $product->delete();
            return redirect('product')->with('success', 'Product deleted successfuly');
        }
        else return redirect('product')->with('success', 'Product was not found');
    }
}
