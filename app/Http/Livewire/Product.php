<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shoppingcart;

class Product extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.product');
    }



    public function addToCart($id){
        if(auth()->user()){
             $data = ['user_id' =>auth()->user()->id,
             'product_id' => $id,
            ];
            if(Shoppingcart::where($data)->where('status','!=', Shoppingcart::STATUS['success'])->exists()){
                session()->flash('info', 'Product already in cart');
                return;
            }
            Shoppingcart::create($data);

            $this->emit('udapteCartCount');
            session()->flash('success', 'Product added to the cart sucessfully');
        }
        else{
            return redirect(route('login'));
        }
    }
}
