<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\likes;

use Auth;

use Illuminate\Http\Request;

class likecontroller extends Controller
{
    //
    public function like($id){
        
        $like = likes::with('user')->where('user_id',Auth::user()->id)->get();
        $l = likes::all(); 
        // return view('home',['likes'=>$l]);       
        // dd($l);
        likes::create([
            'user_id' => Auth::user()->id,
            'product_id'=>$id,
            'like' => 1
        ]);
        
        return redirect()->back();


    }
    public function dis_like($id){
        likes::create([
            'user_id' => Auth::user()->id,
            'product_id'=>$id,
            'like' => 0
        ]);
        return redirect()->back();
    }
}
