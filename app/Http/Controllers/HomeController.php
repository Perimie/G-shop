<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function home()
    {
        return view('home.index');
    }
    public function shop()
    {
        return view('shop.index');
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
}
