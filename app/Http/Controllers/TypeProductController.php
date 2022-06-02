<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\type_product;
use Illuminate\Http\Request;

class TypeProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function create_type_product(){

        $role = Auth::user()->role;
        if($role == '1'){
            return view('admin.create_type_product');


        }else{
            redirect('/product');
        }
    }

    public function store_create_type(Request $request){

        // dd($request->all());

        $request->validate([
            'type_product' => 'required|max:255|unique:type_products',
        ]);

        type_product::create([
            'type_product' => $request->type_product,

        ]);
        return redirect('admin');

    }
}
