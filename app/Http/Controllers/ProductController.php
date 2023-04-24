<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // $categories = Category::all();
        // $products = Product::inRandomOrder()
        //     ->whereActive(true)
        //     ->take(16)
        //     ->get();
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

        
        // return view('shop.index', compact('products', 'categories','selectedCategory','selectedPrice'));
        return view('shop.index', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'selectedPrice_min' => $selectedPrice_min,
            'selectedPrice_max' => $selectedPrice_max,
            'searchTerm' => $searchTerm,
          ]);
    }
}
