<?php

namespace App\Http\Controllers;

use App\Category;
use Facade\FlareClient\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View as ViewView;

class BaseController extends Controller
{
  public function __construct()
  {
    //its just a dummy data object.
    $categories = Category::with('children')->whereNull('parent_id')->get(); //children is from category model

    // Sharing is caring
    FacadesView::share('categories', $categories);
  }
}