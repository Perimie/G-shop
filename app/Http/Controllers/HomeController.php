<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function home()
    {

        $product = Products::all();
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();

        return view('home.index', compact('product','count'));
    }

    public function login_home()
{
    if (!Auth::check()) {
        return redirect()->route('login'); 
    }

    $product = Products::all();
    $user_id = Auth::id();
    $count = Cart::where('user_id', $user_id)->count();

    return view('home.index', compact('product', 'count'));
}


    public function shop()
    {
       
    
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();
        $product = Products::all();
        return view('shop.index',compact('product','count'));
    }
    public function why()
    {
       
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();

        return view('why_us.index',compact('count'));
    }
    public function testimonial()
    {

       
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();
        return view('testimonials.index',compact('count'));
    }
    public function contactUs()
    {
     
    
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();
        return view('contact.index',compact('count'));
    }

        public function products_details($id)
        {

            $product = Products::find($id);
        
        
            $user_id = Auth::id();
            $count = Cart::where('user_id', $user_id)->count();

            return view('home.products_details', compact('product','count'));
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
    public function mycart()
    {

        $user_id = Auth::id();

        //get specific data in the cart table base on user id
        $show = Cart::where('user_id', $user_id)->get();
        //for coounting sa laman ng cart
        $count = Cart::where('user_id', $user_id)->count();

        return view('home.cart_items', compact('show','count'));
    }

    public function cart_search(Request $request)
{
    $search = $request->input('search', '');
    $user_id = Auth::id();

    // Check if there is a search query
    if ($search) {
        // If there's a search query, fetch all matching records without pagination
        $show = Cart::with('product')
            ->whereHas('product', function ($query) use ($search) {
                $query->where('productName', 'LIKE', '%' . $search . '%');
            })
            ->get(); // Use get() to fetch all results without pagination
    } else {
        // If there's no search query, paginate the results
        $show = Cart::where('user_id', Auth::id())->paginate(5);
    }
    $count = Cart::where('user_id', $user_id)->count();

    return view('home.cart_items', compact('show','count'));
    
}

    public function confirm_order(Request $request, $id)
    {
        $name = $request->name;
        $address = $request->rec_address;
        $phone = $request->phone;
        $quantity = $request->quantity;
        $totalPrice = $request->total_price; // Get the total price from the form input

        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->where('id', $id)->first();

        if ($cart) {
            $product = Products::find($cart->product_id);

            if ($product && $product->quantity >= $quantity) {
                // Create the order and store the total price
                $order = new Order();
                $order->name = $name;
                $order->rec_address = $address;
                $order->phone = $phone;
                $order->quantity = $quantity;
                $order->total_price = $totalPrice; // Save the calculated total price
                $order->user_id = $user_id;
                $order->product_id = $cart->product_id;
                $order->save();

                // Update product stock
                $product->quantity -= $quantity;
                $product->save();

                // Remove cart item
                $cart->delete();

                toastr()->timeout(3000)->closeButton()->success('Order placed successfully!');
            } else {
                toastr()->timeout(3000)->closeButton()->error('Insufficient stock for ' . $product->productName);
            }
        } else {
            toastr()->timeout(3000)->closeButton()->error('Cart item not found.');
        }

        return redirect()->back();
    }





    public function remove_tocart($id)
    {
        $show = Cart::find($id);
         
        $show->delete();
        
        toastr()->timeout(3000)->closeButton()->success('Remove to cart Successfully');

        return redirect()->back();

    }

    public function sendContact(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'message' => 'required|string'
    ]);

    // Send email
    Mail::to('cjoco166@gmail.com')->send(new ContactMail($validatedData));
    toastr()->timeout(3000)->closeButton()->success('Message Successfully');

    // Redirect or show a success message
    return redirect()->back();
}



    
}
