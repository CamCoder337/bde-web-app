<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shoppingcart as Cart;

class Cartcounter extends Component
{
    public $total = 0;
    protected $listeners = ['udapteCartCount' => 'getCartItemCount'];
    public function render()
    {
        $this->getCartItemCount();
        return view('livewire.cartcounter');
    }
    public function getCartItemCount(){
        $this->total = Cart::whereUserId(auth()->user()->id)
        ->where('status','!=', Cart::STATUS['success'])
        ->count();
    }
}
