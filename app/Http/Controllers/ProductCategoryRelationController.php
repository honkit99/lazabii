<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ProductStoreRequest;
use App\Http\Requests\User\ProductUpdateRequest;
use App\Product;
use App\ProductCategoryRelation;
use Illuminate\Http\Request;

class ProductCategoryRelationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all();

        return view('user.product.index', compact('products'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.product.create');
    }

    /**
     * @param \App\Http\Requests\User\ProductStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validated();
        $product = Product::create($request->validated());

        $request->session()->flash('success', 'You have created successfully');
        session('success');

        return redirect()->route('user.product.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategoryRelation $productCategoryRelation)
    {
        //$id = $Prodcategory->id;
       // $sql = ProductCategoryRelation::wherecategory_id($ProdcategoproductCategoryRelationry);
        dd($productCategoryRelation);
        // ProductCategoryRelation::wherecategory_id()
        // dd($product);
        return view('user.product.show', compact('product'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        return view('user.product.edit', compact('product'));
    }

    /**
     * @param \App\Http\Requests\User\ProductUpdateRequest $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validated();
        $product->update($request->validated());

        $request->session()->flash('success', 'You have updated successfully');
        session('success');
        
        return redirect()->route('user.product.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $product->delete();

        $request->session()->flash('success', 'You have deleted successfully');
        session('success');

        return redirect()->route('user.product.index');
    }
}
