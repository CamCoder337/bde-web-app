<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request){
       
    }
}


// $product = Product::findOrFail($request->id);
// $cart = session()->get('cart');
// if(!$cart){
//     $cart = [
//         $request->id => [
//             "name" => $product->name,
//             "quantity" => 1,
//             "price" => $product->price,
//             "photo" => $product->photo
//         ]
//     ];
//     session()->put('cart', $cart);
//     return redirect()->back()->with('success', 'Product added to cart successfully!');
// }
// if(isset($cart[$request->id])){
//     $cart[$request->id]['quantity']++;
//     session()->put('cart', $cart);
//     return redirect()->back()->with('success', 'Product added to cart successfully!');
// }
// $cart[$request->id] = [
//     "name" => $product->name,
//     "quantity" => 1,
//     "price" => $product->price,
//     "photo" => $product->photo
// ];
// session()->put('cart', $cart);
// return redirect()->back()->with('success', 'Product added to cart successfully!');