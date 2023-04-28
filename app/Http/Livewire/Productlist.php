<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use Livewire\WithPagination;

class Productlist extends Component
{
    use WithPagination;

    public function render(Request $request)
    {
        
        $query = Product::query();
        $query->where('active', 1);

        $selectedCategory = $request->input('category');
        if ($selectedCategory) {
            $query->where('category_id', $selectedCategory);
        }
        $price = $request->input('price');
        if ($price) {
            $query->where('price', '<=', $price);
        }
        $searchTerm = $request->input('search');
        if ($searchTerm) {
        $query->where('name', 'LIKE', '%'.$searchTerm.'%');
        }
        $products = $query->paginate(10);

        $categories = Category::all();
        // $products = Product::get();
        return view('livewire.productlist', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'price' => $price,
            'searchTerm' => $searchTerm,
        ]);
    }

    



}
