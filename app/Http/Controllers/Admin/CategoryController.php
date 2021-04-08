<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorys = Category::all();

        return view('admin.auth.productcategory', compact('categorys'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categorys = Category::whereParent_id(null)->get();
        return view('admin.auth.addproductcategory', compact('categorys'));
    }

    /**
     * @param \App\Http\Requests\Admin\CategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'image'=>'required',
            'status'=> 'required',
        ],[
        ],[
            ]);
        $input= $request->all();
        if($request->hasFile('image'))
        {
            $destination_path = 'public/images/users';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path,$image_name);

            $input['image'] = $image_name;
        }
        Category::create($input);
        return redirect()->route('admin.categorys.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Category $category)
    {
        return view('admin.auth.editproductcategory', compact('category'));
    }

    /**
     * @param \App\Http\Requests\Admin\CategoryUpdateRequest $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validated=$request->validate([
            'parent_id' => 'required',
            'name' => 'required',
            'status'=> 'required',
        ],[
        ],[
            ]);
            $input= $request->all();
            if($request->hasFile('image'))
            {
                $destination_path = 'public/images/users';
                $image = $request->file('image');
                $image_name = $image->getClientOriginalName();
                $path = $request->file('image')->storeAs($destination_path,$image_name);
    
                $input['image'] = $image_name;
            }
            $category->update($input);

        return redirect()->route('admin.categorys.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        $category->delete();

        $request->session()->flash('success', "You created successfully");

        return redirect()->route('admin.categorys.index');
    }
}
