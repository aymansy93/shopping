<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\product;
use App\Models\type_product;
use App\Models\order;
use App\Models\order_details;
use Illuminate\Http\Request;
// use Illuminate\http\uploadedfile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        // admin role == '1'
        // dd('test');
        $role = Auth::user()->role;
        if($role == '1'){
            $products= product::all();
            return view('admin.main',['products'=> $products]);

        }else{
            abort(403);
        }
    }

    public function create()
    {
        $products= type_product::all();
        $role = Auth::user()->role;
        if($role == '1'){
            return view('admin.create',['products' => $products]);


        }else{
            redirect('/product');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // foreach($request->all() as $key => $value){
        //     echo $key . "<br>";
        //     $type = type_product::where($key);
        //     dd($request->all());
        // }
        // dd($request->all());
        $request->validate([
            'name' =>  ' required|max:255|unique:products',
            'title' => 'required|max:255',
            'price' => 'required|max:10',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        // dd($request->type);


        $img_ex = $request->image->getClientOriginalExtension();
        $img_name = time() . '.'. $img_ex;
        $path = "storage/product/$request->type/";
        $request->image ->move(public_path($path),$img_name);
        // dd($request->image ->move(public_path($path),$img_name));


        product::create([

            'name' => $request->name,
            'title'=> $request->title,
            'price' => $request->price,
            'image_path' => $img_name,
            'type_products' => $request->type,

        ]);


        return redirect("/admin");




        // return redirect()->back()->with(['create' => 'تمت الاضافة بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = product::find($id);
        return view('product.show',['product'=> $product]);

    }
    public function edit($id)
    {
        //
        $pro = product::find($id);
        $type= type_product::all();
        // dd($type);

        return view('admin.edit',['product' => $pro,'type_pro'=> $type]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
        $request->validate([
            'name' =>  'max:255|unique:products',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $name=$product->name = $request->name;
        $title = $product->title = $request->title;
        $price = $product->price = $request->price;
        $type = $product->type_products = $request->type;
        // dd($type);

        $product->save();

        return redirect()->back()->with("status","تم التعديل بنجاح ");




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin)
    {
        //
        product::find($admin)->delete();
        // dd($request->all());
        return redirect()->back()->with("status","تم الحذف بنجاح ");

    }
    public function orderuser(){


        $orders = order_details::all();
        // $t = order_details::all();
        // ['','user_id','total','created_at','updated_at','status'];
        // $order = order::select('id','order_numper','total','status')->with('order_details:id,qty')->get();
        // dd($orders);
        // dd($t);
        
        
        

        return view('admin.order_user',['orders'=>$orders]);
        

    }
    public function changestatus(Request $request ,$id){
            // dd($request->all());
            $order = order::find($id);
            $order::where('id',$id)->update(['status'=>$request->status]);
            return back();
    }

}
