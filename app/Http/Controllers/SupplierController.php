<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Session;

use App\Supplier;
use App\Product;

class SupplierController extends Controller
{

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
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('admin.supplier')->with('suppliers', $suppliers)->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.supplier');
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
            'supplierName'=>'required|max:120|unique:suppliers',
            'contact'=>'required|max:120',
            'address'=>'required|max:120',
            'phone_number'=>'required|max:120',
            'email'=>'required|email',
            'status'=>'required'
          ]);

          $product = new Supplier;
          $product->supplierName = $request['supplierName'];
          $product->supplierContact = $request['contact'];
          $product->supplierTelephone = $request['phone_number'];
          $product->address = $request['address'];
          $product->supplierEmail = $request['email'];
          $product->supplierStatus = $request['status'];
          $product->save();

          return redirect()->route('supplier.index')
          ->with('flash_message','Tiekėjas'. $product->name.' sukurtas!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = Supplier::where('id', $id)->first();
        return view('admin.suppliers.edit')->with('suppliers', $suppliers);
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
            'supplierName'=>'required|max:120',
            'supplierContact'=>'required|max:120',
            'address'=>'required|max:120',
            'supplierTelephone'=>'required|max:120',
            'supplierEmail'=>'required|email',
            'supplierStatus'=>'required'
          ]);


            $supplier = Supplier::where('id', $id)->first();
            $supplier->supplierName = $request['supplierName'];
            $supplier->supplierContact = $request['supplierContact'];
            $supplier->supplierTelephone = $request['supplierTelephone'];
            $supplier->address = $request['address'];
            $supplier->supplierEmail = $request['supplierEmail'];
            $supplier->supplierStatus = $request['supplierStatus'];
            $supplier->update();

            return redirect('admin/suppliers')->with('flash_message','Tiekėjas'. $supplier->name.' atnaujintas!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier -> delete();

      return redirect()->route('admin.supplier')
          ->with('flash_message','Ištrinta.');
    }
}
