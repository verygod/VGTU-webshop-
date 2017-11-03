<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Category;
use App\Supplier;
use App\Product;
use App\Image;


class ProductController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $suppliers = Supplier::all();
        $products = Product::all();

        return view('admin.product')
                ->with('suppliers', $suppliers)
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

          $this->validate($request, [
            'name'=>'required|max:120|unique:products',
            'price'=>'required|numeric',
            'quantity'=>'required|max:120|numeric',
            'supplier'=>'required|numeric',
            'category'=>'required|numeric',
            'description'=>'required',
            'status'=>'required|numeric',
            'imageURL' => 'required|mimes:jpeg,bmp,png'
          ]);



          $image = $request['imageURL'];
          $destination = 'storage/';

          $filename = Str::lower(
              pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)
              .'-'
              .uniqid()
              .'.'
              .$image->getClientOriginalExtension()
          );
          $imagepath = $image->move($destination, $filename);

          $product = new Product;
          $product->name = $request['name'];
          $product->price = $request['price'];
          $product->oldprice = $request['price'];
          $product->quantity = $request['quantity'];
          $product->supplierID = $request['supplier'];
          $product->categoryID = $request['category'];
          $product->description = $request['description'];
          $product->imageURL = $imagepath;
          $product->status = $request['status'];
          $product->save();

          $images = new Image;
          $images->name = $request['name'];
          $images->productID = $product->id;
          $images->image = $imagepath;
          $images->save();

          return redirect('admin/products')->with('flash_message','Produktas '. $product->name.' sukurtas!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $products = Product::where('id', $id)->first();
      return view('admin.products.edit')->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $products = Product::where('id', $id)->first();
      $suppliers = Supplier::all();
      $categories = Category::all();
      return view('admin.products.edit')
              ->with('products', $products)
              ->with('categories', $categories)
              ->with('suppliers', $suppliers);
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
      $this->validate($request, [
        'name'=>'required|max:120',
        'price'=>'required|numeric',
        'quantity'=>'required|max:120|numeric',
        'supplierID'=>'required|numeric',
        'categoryID'=>'required|numeric',
        'description'=>'required',
        'status'=>'required|numeric',
        'imageURL' => 'mimes:jpeg,bmp,png'
      ]);


      $product = Product::where('id', $id)->find($id);

      if(!empty($request['imageURL'])) {
      $image = $request['imageURL'];
      $destination = 'storage/';
      $filename = Str::lower(
          pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)
          .'-'
          .uniqid()
          .'.'
          .$image->getClientOriginalExtension()
      );
        $imagepath = $image->move($destination, $filename);
      } else {
        $imagepath = $product->imageURL;
      }


      if ($product->price != $request['price']) {
        $product->oldprice = $product->price;
        $product->price = $request['price'];
      } else {
        $product->price = $request['price'];
        $product->oldprice = $request['price'];
      }

      $product->name = $request['name'];
      $product->quantity = $request['quantity'];
      $product->supplierID = $request['supplierID'];
      $product->categoryID = $request['categoryID'];
      $product->description = $request['description'];
      $product->imageURL = $imagepath;
      $product->status = $request['status'];
      $product->update();



      $images = Image::where('productID', $id)->first();
      $images->name = $request['name'];
      $images->image = $imagepath;
      $images->productID = $product->id;
      $images->update();

      return redirect('admin/products')->with('flash_message','Produktas '. $product->name.' atnaujintas!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $products = Product::findOrFail($id);
      $products->delete();

      return redirect()->route('admin.products')
          ->with('flash_message','Ištrinta.');
    }
}
