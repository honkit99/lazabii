<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all();
        return view('admin.auth.product', compact('products'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categorys = Category::all();
        return view('admin.auth.addproduct',compact('categorys'));
    }

    /**
     * @param \App\Http\Requests\Admin\ProductStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $request->validate([
            'name' => 'required',
            'price'=> 'required',
            'quantity'=> 'required',
            'description'=> 'required',
        ],[
            'name.required'=>'Please fill in the name',
        ],[
            ]);
            $product=Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'status' => 1
            ]);
        $product->category()->attach($request->category);
        return redirect()->route('admin.products.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        return view('admin.auth.productdetails', compact('product'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * @param \App\Http\Requests\Admin\ProductUpdateRequest $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->validated());

        $request->session()->flash('success', "You created successfully");

        return redirect()->route('admin.product.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $product->delete();

        $request->session()->flash('success', "You created successfully");

        return redirect()->route('admin.products.index');
    }

    public function addImages(Request $request,$id=null, Product $product)
    {
             $products = Product::all();
   
        $productDetails = product::where(['id'=>$id])->first();
        // if($request->isMethod('post')){
        //     $data=$request->all();{
        //         $files = $request->file('product_image');
        //         foreach($files as $file)
        //         {
        //             $image = new ProductImage;
        //             $extension = $file->getClientOriginalExtension();
        //             $filename = rand(111,9999).'.'.$extension;
        //             $image_path = 'uploads/products';
        //             ProductImage::make($file)->save($image_path);
        //             $image->product_id = $data['product_id'];
        //             $image->save();
        //         }
        //     }
        // }
        return view('admin.auth.product', compact('products'));
    }
}
