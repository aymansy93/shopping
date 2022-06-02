<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\product;
use App\Models\type_product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {

        
        $res = product::all();

        // dd($res);
        $type = type_product::all();

        return view('home',['products' => $res,'type' =>$type]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
        $product = product::find($id);
        // dd($order);
        return view('product.product',['product'=>$product]);
    }




}
