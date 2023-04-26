<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Shoppingcart;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class Productlist extends Component
{
    use WithPagination;

    public function render(Request $request)
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
        // $products = Product::get();
        return view('livewire.productlist', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'selectedPrice_min' => $selectedPrice_min,
            'selectedPrice_max' => $selectedPrice_max,
            'searchTerm' => $searchTerm,
        ]);
    }

    public function addToCart($id){
        if(auth()->user()){
             $data = ['user_id' =>auth()->user()->id,
             'product_id' => $id,
            ];
            Shoppingcart::updateOrCreate($data);

            $this->emit('udapteCartCount');
            session()->flash('success', 'Product added to the cart sucessfully');
        }
        else{
            return redirect(route('login'));
        }
    }



}
