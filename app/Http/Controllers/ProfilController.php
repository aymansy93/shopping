<?php

namespace App\Http\Controllers;
use App\Models\order;
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
        $order = order::where('user_id',Auth::user()->id)->get();
        return view('profil.myorder',['orders'=> $order]);
    }
}
