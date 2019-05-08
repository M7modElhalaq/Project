<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('dashboard.products.create')->with([
            'categories' => $categories,
            'sub_categories' => $sub_categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'image' => 'required|mimes:jpeg,bmp,png',
            'short_description' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        $featured = $request->image;
        $featured_new_name = time().'_'.$featured->getClientOriginalName();
        $featured->move('img/products', $featured_new_name);

        $product = new Product;

        $product->name = $request->name;
        $product->image = $featured_new_name;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->availability = $request->availability;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->category_id    = $request->category;
        $product->sub_category_id = $request->sub_category;

        $product->save();

        return redirect()->route('products')->with('success', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $product = Product::find($id);
        return view('dashboard.products.edit')->with([
            'categories' => $categories,
            'sub_categories' => $sub_categories,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'short_description' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        $product = Product::find($id);

        if($request->image != "") {
            $featured = $request->image;
            $featured_new_name = time().'_'.$featured->getClientOriginalName();
            $featured->move('img/products', $featured_new_name);

            $product->image = $featured_new_name;
        }

        $product->name = $request->name;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->availability = $request->availability;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->category_id    = $request->category;
        $product->sub_category_id = $request->sub_category;

        $product->save();

        return redirect()->route('products')->with('success', 'Product Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }
}
