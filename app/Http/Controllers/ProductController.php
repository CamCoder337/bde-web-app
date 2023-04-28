<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        $selectedCategory = $request->input('category');
        if ($selectedCategory) {
            $query->where('category_id', $selectedCategory);
        }
        $selectedPrice_min = $request->input('min_price');
        if ($selectedPrice_min) {
            $query->where('price', '>=', $selectedPrice_min);
        }

        $selectedPrice_max = $request->input('max_price');
        if ($selectedPrice_max) {
            $query->where('price', '<=', $selectedPrice_max);
        }
        $searchTerm = $request->input('search');
        if ($searchTerm) {
        $query->where('name', 'LIKE', '%'.$searchTerm.'%');
        }
        $products = $query->paginate(10);

        $categories = Category::all();

        return view('shop.index', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'selectedPrice_min' => $selectedPrice_min,
            'selectedPrice_max' => $selectedPrice_max,
            'searchTerm' => $searchTerm,
          ]);
    }


    public function cart()
    {
        return view('shop.cart');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++; 
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('shop.show', ['product' => $product]);
    }
}
