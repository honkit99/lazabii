<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Http\Requests\User\CategoryStoreRequest;
use App\Http\Requests\User\CategoryUpdateRequest;
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

        return view('user.category.index', compact('categorys'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.category.create');
    }

    /**
     * @param \App\Http\Requests\User\CategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = Category::create($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('user.category.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Category $category)
    {
        return view('user.category.show', compact('category'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Category $category)
    {
        return view('user.category.edit', compact('category'));
    }

    /**
     * @param \App\Http\Requests\User\CategoryUpdateRequest $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update($request->validated());

        $request->session()->flash('success', $success);

        return redirect()->route('user.category.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        $category->delete();

        $request->session()->flash('success', $success);

        return redirect()->route('user.category.index');
    }
}
