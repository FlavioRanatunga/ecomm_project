<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();

        return view('admin.category', compact('data')); 
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->success('Category added successfully');
        return redirect()->back();
        
    }

    public function edit_category($id)
    {
        $data= Category::find($id);

        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data= Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->success('Category added successfully');
        return redirect('/view_category');
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->success('Category removed successfully');
        return redirect()->back();
    }

    public function add_product()
    {
        $category = Category::all();

        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $imagename);

            $product->image = $imagename;
        }

        $product->save();

        toastr()->success('Product added successfully');

        return redirect()->back();
    }

    public function view_product()
    {
        $data = Product::paginate(10);
    
        return view('admin.view_product', compact('data'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $image_path = public_path('products/'.$product->image);

        if(file_exists($image_path))
        {
            unlink($image_path);
        }
        $product->delete();
        toastr()->success('Product deleted successfully');

        return redirect()->back();

    }

    public function edit_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        
        return view('admin.edit_product', compact('data', 'category'));
    }

    public function update_product(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $imagename);

            $product->image = $imagename;
        }

        $product->save();

        toastr()->success('Product updated successfully');

        return redirect('/view_product');
    }

    public function search_product(Request $request)
    {
        $search = $request->search;
        $data = Product::where('title', 'LIKE', "%$search%")
        ->orWhere('description', 'LIKE', "%$search%")
        ->orWhere('category', 'LIKE', "%$search%")
        ->paginate(10);

        error_log($data->toJson());

        return view('admin.view_product', compact('data'));
    }

    public function view_order()
    {
        $order = Order::all();

        return view('admin.view_order', compact('order'));
    }

    public function status_otw($id)
    {
        $order = Order::find($id);
        $order->status = 'On the way';
        $order->save();
        return redirect()->back();
    }

    public function status_del($id)
    {
        $order = Order::find($id);
        $order->status = 'Delivered';
        $order->save();
        return redirect()->back();
    }
}
