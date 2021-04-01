<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $products = Product::all();
       // $categories = Category::with('children')->whereNull('parent_id')->get();
       $categories = \App\Category::where('parent_id',0)->get();
        dd($categories);
        // $subcategories = Category::select('categories.name','c.name')
        //                 ->join('categories AS c','c.id','=','categories.parent_id')->get();
        return view('user.home',compact('products','categories','subcategories'));
    }


}
