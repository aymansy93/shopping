<?php

namespace App\Http\Livewire;
use Cart;

use Livewire\Component;

class Cartcounter extends Component
{
    public function render()
    {
        $cartcount = Cart::content()->count();
        return view('livewire.cartcounter',['cart'=> $cartcount]);
    }
}
