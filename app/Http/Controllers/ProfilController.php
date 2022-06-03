<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\order_details;

use Illuminate\Http\Request;
use Auth;

class ProfilController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(){
        return view('profil.index');
    }
    public function myorder(){

        
        $order = order::with('order_details')->where('user_id',Auth::user()->id)->get();
        // dd($order);
        return view('profil.myorder',['orders'=> $order]);
    }
}
