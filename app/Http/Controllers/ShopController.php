<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\Image;

class ShopController extends Controller
{
    public function __construct() {
          $this->middleware('auth', ['except' => ['index', 'search', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::where('status', 1)->get();
      $products = Product::paginate(8);
      return view('shop')
              ->with('products', $products)
              ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::where('id', $id)->get();
        $images = Image::where('productID', $id)->get();
        return view('product')
              ->with('products', $products)
              ->with('images', $images);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->id;
        if (is_null($search))
        {
          return view('search');
        }
        else
        {
        $products = Product::where('name','LIKE',"%{$search}%")->orWhere('price','LIKE',"%{$search}%" )->get();
        return view('search')->with('products', $products);
        }

        // if ($request->is('admin'))
    }

    public function searchvue(Request $request)
    {
       $query = Input::get('query');
       $products = Product::where('name','like','%'.$query.'%')->get();
       return response()->json($products);
    }
}
