<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function home()
    {
        $product = Products::all();

        return view('home.index', compact('product'));
    }

    public function login_home()
    {
        $product = Products::all();

        return view('home.index', compact('product'));
    }

    public function shop()
    {
        $product = Products::all();
        return view('shop.index',compact('product'));
    }
    public function why()
    {
        return view('why_us.index');
    }
    public function testimonial()
    {
        return view('testimonials.index');
    }
    public function contactUs()
    {
        return view('contact.index');
    }

    public function products_details($id)
    {

        $product = Products::find($id);


        return view('home.products_details', compact('product'));
    }

    public function add_cart($id)
    {

        // gets the product id
        $product_id = $id;

        // get the users id while log in and store it in a variable $user_id
        $user = Auth::user();

        $user_id = $user->id;

        // create data for the cart
        $data = new Cart;

        //store the data in the databse using $data to its user and product id 
        $data->user_id = $user_id;
        // THE user_id without $ is from the table column name 
        $data->product_id = $product_id;

        // SAVE the data in the database
        $data->save();

        toastr()->timeout(3000)->closeButton()->success('Added to  the cart Successfully');

        return redirect()->back();


    }
}
