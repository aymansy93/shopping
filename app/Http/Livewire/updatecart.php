<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class updatecart extends Component
{
    public function render()
    {
        $id= Cart::content();
        return view('livewire.updatecart',['id'=>$id]);
    }
    public function update($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty + 1 ;
        Cart::update($rowId , $qty);

    }
    public function update_dec($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1 ;
        Cart::update($rowId , $qty);

    }
    public function remove($rowId){

        $product = Cart::get($rowId);
        Cart::remove($rowId);




    }
    
}
