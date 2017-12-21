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
use App\AddToBasket;

use App\Orders;
use App\OrderedItems;


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
      $cart = AddToBasket::all();

      $orders = Orders::where('customerid', $id)->orderBy('id', 'desc')->paginate(3);
      $OrderedItems = OrderedItems::all();

      $content = AddToBasket::where('userID', '=', $id)->get();
      $total = 0;
        foreach ($content as $row) {
          $total += $row['price'] * $row['quantity'];
        }

      return view('home')
              ->with('cart', $cart)
              ->with('products', $products)
              ->with('user', $user)
              ->with('orders', $orders)
              ->with('OrderedItems', $OrderedItems)
              ->with('total', $total);
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

    
    $auth = Auth::id();

    if (AddToBasket::where([['productID', '=', $id],['userID', '=', $auth]])->exists()) {

    $cart = AddToBasket::where([
    ['productID', '=', $id],
    ['userID', '=', $auth],
    ])->first();

    // dd($basket);
    $cart->quantity = $cart->quantity + 1;
    $cart->update();

    return back()->with('flash_message','Dabar krepšelyje yra <strong>'. $cart->quantity .'vnt.</strong> šios prekės!');
    } else {

    $product = Product::where('id', $id)->first();

    $cart = new AddToBasket();
    $cart->productID = $id;
    $cart->name = $product->name;
    $cart->price = $product->price;
    $cart->quantity = 1;
    $cart->userID = Auth::id();
    $cart->save();

    return back()->with('flash_message','Prekė pridėta į krepšelį!');

   }

  }

  public function updateCart(Request $request)
  {


    $auth = Auth::id();
    $cart = AddToBasket::where('userID', '=', $auth)->get();

    foreach ($cart as $item) {
        $cartUpdate = AddToBasket::where([['id', '=', $item['id']]])->first();
        $cartUpdate->quantity = $request['qty'.$item['id']];
        $cartUpdate->update();
    }


    return redirect('home')->with('flash_message','Prekės atnaujintos!');
  }


  public function removeFromCart($id)
  {
    $auth = Auth::id();
    $cart = AddToBasket::where([
      ['id', '=', $id], 
      ['userID', '=', $auth]])->first();
    $cart -> delete();
    return redirect('home')->with('flash_message','Prekė pašalinta!');
  }


  public function clearCart()
  {
    $auth = Auth::id();
    $cart = AddToBasket::where('userID', '=', $auth)->get();

    foreach ($cart as $key) {
      $key->delete();
    }
    return redirect('home')->with('flash_message','Prekės pašalintos!');
  }

  public function checkout()
  {
    
        $id = Auth::id();
        $user = User::where('id', $id)->first();
        $content = AddToBasket::where('userID', '=', $id)->get();
        $shippingMethod = 'DPD';

    
        if (!empty($user->address) && !empty($user->city) && !empty($user->postcode) &&
            !empty($user->telephone) && !empty($user->email) && count($content) >= 1) {


        $total = 0;
        foreach ($content as $row) {
          $total += $row['price'] * $row['quantity'];
        }
        // echo $total;

        $order = new Orders;
        $order->customerid = $id;
        $order->shipping = $shippingMethod;
        $order->totalprice = $total;
        $order->shippingAddress = $user->address;
        $order->shippingCity = $user->city;
        $order->shippingPostcode = $user->postcode;
        $order->shippingEmail = $user->email;
        $order->shippingTelephone = $user->telephone;
        $order->status = 1;
        $order->save();

        foreach ($content as $row) {

          $OrderedItems = new OrderedItems;
          $OrderedItems->name = $row->name;
          $OrderedItems->price = $row->price;
          $OrderedItems->quantity = $row->quantity;
          $OrderedItems->orderID = $order->id;
          $OrderedItems->save();

          $product = Product::where('id', $id)->first();
          $product->quantity = $product->quantity - $row->quantity;
          $product->update();

        }

        $cart = AddToBasket::where('userID', '=', $id)->get();
        foreach ($cart as $key) {
          $key->delete();
        }

        return redirect()->route('home.index')->with('flash_message', 'Užsakymas <b></b> patvirtinas!<br> Savo vartotojo sąsajoje matysite užsakymo eigą.');
          } else {
        return redirect()->route('home.index')->with('flash_message', 'Neužpildėte visos informacijos arba krepšelis yra tuščias.');
        }
      }
}