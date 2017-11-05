<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Gloudemans\Shoppingcart\Facades\Cart;

use Auth;
use Session;

use App\Category;
use App\Supplier;
use App\Product;
use App\User;



class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct() {
       $this->middleware(['auth', 'clearance'])->except('index', 'show');
   }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $id = Auth::id();
      $user = User::where('id', $id)->first();
      $products = Product::all();
      $cart = Cart::content();
      return view('home')
              ->with('cart', $cart)
              ->with('products', $products)
              ->with('user', $user);
  }

  public function update(request $request, $id)
  {
    $this->validate($request, [
      'name'=>'required|max:120',
      'surname'=>'required|max:120',
      'city'=>'required',
      'postcode'=>'required|max:8',
      'address'=>'required',
      'telephone'=>'required|numeric'
    ]);


    $user = User::where('id', $id)->first();
    $user->name = $request['name'];
    $user->surname = $request['surname'];
    $user->city = $request['city'];
    $user->postcode = $request['postcode'];
    $user->address = $request['address'];
    // $user->email = $request['email'];
    $user->telephone = $request['telephone'];
    $user->update();

    return redirect('home')->with('flash_message','Informacija atnaujinta!');
  }

  public function AddToCart($id)
  {

    $product = Product::where('id', $id)->first();

    Cart::add(
      $product->id,
      $product->name,
      1,
      $product->price
    );

      return redirect('/')->with('flash_message','Prekė pridėta į krepšelį!');
  }

  public function updateCart(Request $request)
  {

    $cart = Cart::content();
    foreach ($cart as $item) {
      $qty = $request->input('qty'.$item->id);
      Cart::update($item->rowId, $qty);
    }
    return redirect('home')->with('flash_message','Prekės atnaujintos!');
  }


  public function removeFromCart($id)
  {
    Cart::remove($id);
    return redirect('home')->with('flash_message','Prekė pašalinta!');
  }


  public function clearCart()
  {
    Cart::destroy();
    return redirect('home')->with('flash_message','Prekės pašalintos!');
  }
}
