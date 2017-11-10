<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;

use App\Orders;
use App\OrderedItems;
class ProfileController extends Controller
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
      $id = Auth::id();
      $profile = User::where('id', $id)->get();

      $orders = Orders::where('customerid', $id)->paginate(4);
      $OrderedItems = OrderedItems::all();

      return view('profile')
        ->with('orders', $orders)
        ->with('OrderedItems', $OrderedItems)
        ->with('profile', $profile);
  }
}
