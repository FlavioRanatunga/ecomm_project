<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
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

}
