<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Stripe;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $total_users = User::where('usertype', 'user')->get()->count();
        $total_products =  Product::count();
        $total_orders = Order::count();
        $total_delivered = Order::where('status', 'Delivered')->get()->count();
        return view('admin.index', compact('total_users', 'total_products', 'total_orders', 'total_delivered'));
    }

    public function home()
    {
        $product = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;

            $count = Cart::where('user_id', $user_id) ->count();
        }
        else
        {
            $count='';
        }
        return view('home.index', compact('product', 'count'));
    }

    public function login_home()
    {
        $product = Product::all();
        $user = Auth::user();
        $user_id = $user->id;

        $count = Cart::where('user_id', $user_id) ->count();

        return view('home.index', compact('product', 'count'));
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        if(Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;

            $count = Cart::where('user_id', $user_id) ->count();
        }
        else
        {
            $count='';
        }
        return view('home.product_details', compact('product', 'count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;
        
        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart;

        $data->user_id = $user_id;
        $data->product_id = $product_id;

        $data->save();
        toastr()->success('Product added to the cart successfully');

        return redirect()->back();

    }

    public function view_cart()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $user_id = $user->id;

            $count = Cart::where('user_id', $user_id) ->count();

            $cart = Cart::where('user_id', $user_id) ->get();
        }

        return view('home.cart', compact('count', 'cart')); 
    }

    public function delete_cart($id)
    {
        $cart_item = Cart::find($id);
        $cart_item->delete();
        toastr()->success('Product removed from the cart successfully');

        return redirect()->back();
    }

    public function place_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $order = new Order;

        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id', $user_id)->get(); 

        foreach($cart as $carts)
        {
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $user_id;
            $order->product_id = $carts->product_id;

            $order->save();
        }

        $remove_cart = Cart::where('user_id', $user_id)->get(); 

        foreach($remove_cart as $remove)
        {
            $remove->delete();
        }

        toastr()->success('Order placed successfully');

        return redirect()->back();
    }

    public function view_orders()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $orders = Order::where('user_id', $user_id)->get();
        if(Auth::id())
        {
            $count = Cart::where('user_id', $user_id) ->count();
        }
        else
        {
            $count='';
        }

        return view('home.view_orders', compact('count', 'orders'));
        
        
    }

    public function stripe($value)
    {

        return view('home.stripe', compact('value'));

    }

    public function stripePost(Request $request, $value)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $value * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment" 

        ]);

        $name = Auth::user()->name;
        $address = Auth::user()->address;
        $phone = Auth::user()->phone;

        $order = new Order;

        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id', $user_id)->get(); 

        foreach($cart as $carts)
        {
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $user_id;
            $order->product_id = $carts->product_id;
            $order->payment_status = 'paid';

            $order->save();
        }

        $remove_cart = Cart::where('user_id', $user_id)->get(); 

        foreach($remove_cart as $remove)
        {
            $remove->delete();
        }

        toastr()->success('Order placed successfully');
        return redirect('view_cart');
    }

}
