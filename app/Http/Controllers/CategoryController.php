<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
class CategoryController extends Controller
{



  /**
   * Create a new controller instance.
   *
   * @return void
   */
  //  public function __construct() {
  //      $this->middleware(['auth', 'clearance']);
  //  }

   public function __construct() {
         $this->middleware('auth', ['except' => ['search', 'show']]);
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::all();
      return view('admin.category')->with('categories', $categories);
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
      //Validate name and permissions field
          $this->validate($request, [
            'categoryname'=>'required|max:120|unique:categories',
            'status'=>'required'
          ]);

          $category = new Category;
          $category->categoryname = $request['categoryname'];
          $category->status = $request['status'];
          $category->save();

          return redirect()->route('category.index')
          ->with('flash_message','Kategorija'. $category->categoryname.' sukurta!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $categories = Category::where('id', $id)->get();
      $products = Product::where('categoryID', $id)->paginate(8);
      return view('shop')
              ->with('categories', $categories)
              ->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categories = Category::where('id', $id)->first();
      return view('admin.categories.edit')->with('categories', $categories);
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
        'categoryname'=>'required|max:120',
        'status'=>'required'
      ]);


        $categories = Category::where('id', $id)->first();
        $categories->categoryname = $request['categoryname'];
        $categories->status = $request['status'];
        $categories->update();

        return redirect('admin/categories')->with('flash_message','Kategorija '. $categories->name.' atnaujintas!');
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
}
