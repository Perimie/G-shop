<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;


Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/shop', [HomeController::class,'shop'])->name('shop');
Route::get('/whyUs', [HomeController::class,'why'])->name('why');
Route::get('/testimonials', [HomeController::class,'testimonial'])->name('testimonials');
Route::get('/contactUs', [HomeController::class,'contactUs'])->name('contactUs');





Route::get('/dashboard',[HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//admin routes
route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin'])->name('homeDash');

route::get('admin/view_category',[AdminController::class,'category'])->middleware(['auth','admin'])->name('view_category');

route::get('admin/view_orders',[AdminController::class,'view_orders'])->middleware(['auth','admin'])->name('view_orders');

route::post('add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']);
route::get('delete_category/{id}',[AdminController::class,'delete_category'])->middleware(['auth','admin']);
route::post('edit_category/{id}',[AdminController::class,'edit_category'])->middleware(['auth','admin']);
route::get('add_products',[AdminController::class,'add_products'])->middleware(['auth','admin']);
route::post('upload_product',[AdminController::class,'upload_product'])->middleware(['auth','admin']);
route::get('view_product',[AdminController::class,'view_product'])->middleware(['auth','admin']);
route::get('delete_products/{id}',[AdminController::class,'delete_products'])->middleware(['auth','admin']);
route::get('edit_products/{id}',[AdminController::class,'edit_products'])->middleware(['auth','admin']);
route::post('update_products/{id}',[AdminController::class,'update_products'])->middleware(['auth','admin']);
route::get('products_search',[AdminController::class,'products_search'])->middleware(['auth','admin']);

route::post('on_my_way/{id}',[AdminController::class,'on_my_way'])->middleware(['auth','admin']);
route::get('order_search',[AdminController::class,'order_search'])->middleware(['auth','admin']);
route::get('print_invoice/{id}',[AdminController::class,'print_invoice'])->middleware(['auth','admin']);
Route::get('print_multiple_invoices/{ids}', [AdminController::class, 'print_multiple_invoices'])->middleware(['auth', 'admin']);


route::get('products_details/{id}', [HomeController::class,'products_details']);
route::get('add_cart/{id}', [HomeController::class,'add_cart'])->middleware(['auth', 'verified']);
route::get('add_cart_details/{id}', [HomeController::class,'add_cart'])->middleware(['auth', 'verified']);

route::get('mycart', [HomeController::class,'mycart'])->middleware(['auth', 'verified']);
route::get('cart_search',[HomeController::class,'cart_search'])->middleware(['auth', 'verified']);
route::get('my_orders', [HomeController::class,'my_orders'])->middleware(['auth', 'verified']);
route::get('orders_search',[HomeController::class,'orders_search'])->middleware(['auth', 'verified']);

Route::post('confirm_order/{id}', [HomeController::class, 'confirm_order'])->middleware(['auth', 'verified']);
Route::get('remove_tocart/{id}', [HomeController::class, 'remove_tocart'])->middleware(['auth', 'verified']);



Route::post('/send-contact', [HomeController::class, 'sendContact'])->name('sendContact')->middleware(['auth', 'verified']);

// Route::controller(HomeController::class)->group(function(){
//     Route::get('stripe', 'stripe')->name('stripe');
//     Route::post('stripe', 'stripePost')->name('stripe.post');
// });



