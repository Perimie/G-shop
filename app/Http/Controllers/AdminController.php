<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function category()
    {
        $data = Category::all();
        return view("admin.category",compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category-> category_name = $request->category;

        $category->save();
        toastr()->timeout(3000)->closeButton()->success('Category Added Sucessfully');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();
        toastr()->timeout(3000)->closeButton()->success('Category Deleted Successfully');

        return redirect()->back();
    }

    public function edit_category(Request $request, $id)
    {

        $request->validate([
            'category_name' => 'required|string'
        ]);

        $data = Category::find($id);

        if($data)
        {
            $data->category_name = $request->category_name;
            $data->save();
            toastr()->timeout(3000)->closeButton()->success('Category Updated Sucessfully');
            return redirect()->back()->with('Category Updated Successfully');
           
        }else{
            toastr()->timeout(3000)->closeButton()->error('Category not Updated');

            return redirect()->back()->with('Category Not Updated');

            
        }
    }
    public function add_products()
    {
        $category = Category::all();

        return view('admin.add_products',compact('category'));
    }
    public function upload_product(Request $request)
    {
        $product = new Products;

        $product->productName = $request->productName;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $imagename );

            $product->image=$imagename;
        }

        $product->save();

        toastr()->timeout(3000)->closeButton()->success('Product Added Sucessfully');

        return redirect()->back();


    }
}
