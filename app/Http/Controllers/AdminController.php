<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\Supplier;

class AdminController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct() {
       $this->middleware(['auth', 'clearance']);
   }


  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return view('admin');
  }
  public function products()
  {
    $products = Product::join('categories', 'products.categoryID', '=', 'categories.id')
            ->join('suppliers', 'products.supplierID', '=', 'suppliers.id')
            ->select('categories.*', 'suppliers.*','products.*')
            ->paginate(10);

    return view('admin.products.view')
            ->with('products', $products);
  }

  public function categories()
  {
    $cateogries = Category::paginate(10);
    return view('admin.categories.view')->with('categories', $cateogries);
  }

  public function suppliers()
  {
    $suppliers = Supplier::paginate(10);
    return view('admin.suppliers.view')->with('suppliers', $suppliers);
  }
}
