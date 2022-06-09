<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\likes;

use Auth;

use Illuminate\Http\Request;

class likecontroller extends Controller
{
    //
    public function index(){
        // test

    }
    public function like($id){
         


        
        // $like = 0;
        // if(likes::){

        // }
        // $like = likes::with('product')->get();
        

        // // return view('home');       
        // dd($like);
        // 


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
