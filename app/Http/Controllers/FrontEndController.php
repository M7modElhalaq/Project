<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontEndController extends Controller
{
    public function index() {
//        session()->flush();
        $count = count(session()->get('cart'));
        $cartItems = session()->get('cart');
//        dd($cartItems);
        $categories = Category::take(10)->get();
        $men = Product::where('category_id', 1)->take(8)->orderBy('created_at', 'desc')->get();
        $women = Product::where('category_id', 2)->take(8)->orderBy('created_at', 'desc')->get();
        $sports = Product::where('category_id', 3)->take(8)->orderBy('created_at', 'desc')->get();
        $kids = Product::where('category_id', 4)->take(8)->orderBy('created_at', 'desc')->get();

        $latest = Product::take(8)->orderBy('created_at', 'desc')->get();

        return view('index')->with([
            'categories' => $categories,
            'count' => $count,
            'cartItems' => $cartItems,
            'men' => $men,
            'women' => $women,
            'sports' => $sports,
            'kids' => $kids,
            'latest' => $latest,
            'pageTitle' => 'Home'
        ]);
    }

    public function products($id, $category) {
        $cat = Category::find($id);
        $products = $cat->products()->paginate(20);
        $count = count(session()->get('cart'));
        $cartItems = session()->get('cart');
        $categories = Category::take(10)->get();
        return view('products')->with([
            'category' => $cat,
            'section' => $category,
            'products' => $products,
            'categories' => $categories,
            'count' => $count,
            'cartItems' => $cartItems,
            'pageTitle' => $category
        ]);
    }

    public function addToCart(Request $request) {
        $input = $request->all();
        $id = $input['product_id'];

        $product = Product::find($id);

        if(!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "id" => $product->id,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image
                ]
            ];

            session()->put('cart', $cart);
            session()->save();

//            session()->put('success','Success');
            $cartItems = session()->get('cart');
            $count = count(session()->get('cart'));
            return response()->json([
                'success' => 'Product added to cart successfully!',
                'count' => $count,
                'cartItems' => $cartItems,
                'product' => $product,
                'status' => true
            ]);
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $newQuantity = $cart[$id]['quantity']++;

            session()->put('cart', $cart);
            session()->save();

//            session()->put('success','Success');
            $cartItems = session()->get('cart');
            $count = count(session()->get('cart'));
            return response()->json([
                'success' => 'Product added to cart successfully!',
                'count' => $count,
                'cartItems' => $cartItems,
                'status' => false,
                'productID' => $id,
                'newQuantity' => $newQuantity + 1
            ]);

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image
        ];

        session()->put('cart', $cart);
        session()->save();

//        session()->put('success','Success');
        $cartItems = session()->get('cart');
        $count = count(session()->get('cart'));
        return response()->json([
            'success' => 'Product added to cart successfully!',
            'count' => $count,
            'cartItems' => $cartItems,
            'product' => $product,
            'status' => true
        ]);
    }

    public function removeItemFromCart(Request $request) {
//        dd($request);
        $input = $request->all();
        $id = $input['id'];

        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        session()->save();

        $count = count(session()->get('cart'));
        return response()->json([
            'success' => 'Product Removed successfully!',
            'count' => $count,
        ]);
    }

    public function sortProductsBy($id, $category, Request $request) {
        $cat = Category::find($id);
        if($request->sort === 2) {
            $products = $cat->products()->sortBy('name')->paginate(20);
        } else if($request->sort === 3) {
            $products = $cat->products()->sortBy('price')->paginate(20);
        }else if ($request->sort === 4) {
            $products = $cat->products()->sortBy('created_at')->paginate(20);
        } else {
            $products = $cat->products()->paginate(20);
        }

        $count = count(session()->get('cart'));
        $cartItems = session()->get('cart');
        $categories = Category::take(5)->get();
        return view('products')->with([
            'category' => $cat,
            'section' => $category,
            'products' => $products,
            'categories' => $categories,
            'count' => $count,
            'cartItems' => $cartItems,
            'pageTitle' => $category
        ]);
    }

    public function productDetail($id) {
        $product = Product::find($id);
        $count = count(session()->get('cart'));
        $cartItems = session()->get('cart');
        $categories = Category::take(10)->get();
        $products = Category::find($product->category->id)->products;
        return view('product-detail')->with([
            'product' => $product,
            'products' => $products,
            'categories' => $categories,
            'count' => $count,
            'cartItems' => $cartItems,
            'pageTitle' => $product->name
        ]);
    }
}
