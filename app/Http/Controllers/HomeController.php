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
      $cart = Cart::content();

      $orders = Orders::where('customerid', $id)->paginate(3);
      $OrderedItems = OrderedItems::all();

      return view('home')
              ->with('cart', $cart)
              ->with('products', $products)
              ->with('user', $user)
              ->with('orders', $orders)
              ->with('OrderedItems', $OrderedItems);
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

  public function checkout()
  {
    
        $id = Auth::id();
        $user = User::where('id', $id)->first();
        $total = Cart::total();
        $content = Cart::content();
        $shippingMethod = 'DPD';

        if (!empty($user->address) && !empty($user->city) && !empty($user->postcode) &&
            !empty($user->telephone) && !empty($user->email) && count($content) >= 1) {

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
          $OrderedItems->quantity = $row->qty;
          $OrderedItems->orderID = $order->id;
          $OrderedItems->save();

          $product = Product::where('id', $row->id)->first();
          $product->quantity = ($product->quantity)-($row->quantity);
          $product->update();

        }


            Cart::destroy();

            return redirect()->route('home.index')->with('flash_message', 'Užsakymas <b></b> patvirtinas!<br> Savo vartotojo sąsajoje matysite užsakymo eigą.');
            } else {
            return redirect()->route('home.index')->with('flash_message', 'Neužpildėte visos informacijos arba krepšelis yra tuščias.');
          }
  }
}
