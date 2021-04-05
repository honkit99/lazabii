<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductImageStoreRequest;
use App\Http\Requests\Admin\ProductImageUpdateRequest;
use App\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productImages = ProductImage::all();

        return view('admin.product_image.index', compact('product_images'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $formInput=$request->all();
        $image=$request->image;
        if($image)
        {
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image']=$imageName;
        }
        ProductImage::create($formInput);
        return view('admin.addproduct.create');
    }

    /**
     * @param \App\Http\Requests\Admin\ProductImageStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate();
        $productImage = ProductImage::create($request->validated());

        $request->session()->flash('success', "You created successfully");
        session('success');
        return redirect()->route('admin.product_image.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ProductImage $productImage
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProductImage $productImage)
    {
        return view('admin.product_image.show', compact('product_image'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ProductImage $productImage
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ProductImage $productImage)
    {
        return view('admin.product_image.edit', compact('product_image'));
    }

    /**
     * @param \App\Http\Requests\Admin\ProductImageUpdateRequest $request
     * @param \App\ProductImage $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductImage $productImage)
    {
        $productImage->update($request->validated());

        $request->session()->flash('success', "You created successfully");

        return redirect()->route('admin.product_image.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ProductImage $productImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ProductImage $productImage)
    {
        $productImage->delete();

        $request->session()->flash('success', "You created successfully");

        return redirect()->route('admin.product_image.index');
    }
}
