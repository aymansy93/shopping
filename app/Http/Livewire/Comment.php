<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Auth;
use App\Models\product;
use App\Models\comments;
class Comment extends Component
{
    public function render()
    {
        return view('livewire.comment');
    }
    public function commentadd(Request $request , $id){

        comments::create([
            'user_id' => Auth::user()->id,
            'product_id' => $id,
            'comment' => $request->message
        ]);
        // <input type="hidden" name="id" value="wire:click.prevent= "remove('{{$id->rowId}}')">
        
        
    }
}
