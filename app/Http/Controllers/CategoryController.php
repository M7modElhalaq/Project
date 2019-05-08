<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|unique:categories|max:255',
            'image' => 'required|mimes:jpeg,bmp,png'
        ]);

        $categoryImage = $request->image;
        $category_image_new_name = time().'_'.$categoryImage->getClientOriginalName();
        $categoryImage->move('img/categories', $category_image_new_name);

        Category::create([
            'name' => $request->name,
            'image' => $category_image_new_name
        ]);

        return redirect()->route('categories')->with('success', 'Category Add Successfully');
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
        $category_edit = Category::find($id);
        return view('dashboard.categories.index')->with([
            'categories' => $categories,
            'category_edit' => $category_edit
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
            'name' => 'required'
        ]);

        $category = Category::find($id);


        if($request->image != '') {
            $categoryImage = $request->image;
            $category_image_new_name = time().'_'.$categoryImage->getClientOriginalName();
            $categoryImage->move('img/categories', $category_image_new_name);

            $category->image = $category_image_new_name;
        }

        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories')->with('success', 'Category Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }
}
