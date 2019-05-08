<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('dashboard.categories.subcategories')->with([
            'categories' => $categories,
            'sub_categories' => $sub_categories
        ]);
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
            'sub' => 'required',
            'main' => 'required'
        ]);

        SubCategory::create([
            'name' => $request->sub,
            'category_id' => $request->main
        ]);

        return redirect()->route('sub_categories')->with('success', 'Category Add Successfully');
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
        $category_edit = SubCategory::find($id);
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('dashboard.categories.subcategories')->with([
            'categories' => $categories,
            'sub_categories' => $sub_categories,
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

        $sub_categories = SubCategory::find($id);

        $sub_categories->name = $request->name;
        $sub_categories->save();

        return redirect()->route('sub_categories')->with('success', 'Category Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::find($id)->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }

    public function selecte(Request $request) {
        $sub_categories = Category::find($request->main)->sub_categories;
        $categories = Category::all();
        return view('dashboard.categories.subcategories')->with([
            'categories' => $categories,
            'sub_categories' => $sub_categories
        ]);
    }
}
