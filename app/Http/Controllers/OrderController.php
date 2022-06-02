<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\order;
use Carbon\Carbon;
use Cart;
use Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {
        return view('product.cart');
    }
    
    public function addToCart(Request $requset , $id){
      

        $product = product::findOrFail($requset->id);
        
         Cart::add([
            ['id' => $product->id, 'name' => $product->name,
             'qty' => 1,
              'price' => $product->price,
             'weight' => 0,
             'options' => ['imgname' => $product->image_path,
             'type_product'=>$product->type_products] ],
            
          ]);
          

        return redirect()->back()->with('success', 'تمت الاضافة الى السلة!');

        
    }
    

    public function checkout(){
        // dd('e');
        return view('product.checkout');
    }

    // ===================================================================

    public function checkout_store(Request $request){
        // create order numper random 
        $order_num = rand(1000, 745757);
        $order_numper = '#online'.str_pad($order_num + 1, 8, "0", STR_PAD_LEFT);
        // ++++++++++++++++++++++++++++++++++++++
        
        // validite 

        // +++++++++++++++++++++++++++++++++++++++
        if($request->name === Auth()->user()->name && $request->email=== Auth()->user()->email){
                                
                                
                if($request->selector == 'on'){
                                        
                     $products = Cart::content();
                                            
                     foreach($products as $product){
                                                
                        $order = order::create([
                        'order_numper' => $order_numper,
                        'user_id' => Auth()->id(),
                        'total' => $request->total,
                        'created_at' => Carbon::now(),
                        'order_name'=> $product->name,
                        'qty' => $product->qty,
                        ]);
                        $pro = product::find($product->id);
                        $pro->order_id= $order->id;
                        $pro->quantity= $product->qty;
                        $pro->save();
                        Cart::destroy();

                                                
                                                                        
                    } 

                    return redirect()->back()->with('success', 'تم طلب المنتج يمكنك التحقق من المشتريات في الملف الشخصي!');


                    }else{
                        return redirect()->back()->with('success', ' يرجى الموافقة على سياسة الخصوصية لدينا!');

                    }

            }else{
                return redirect()->back()->with('success', 'يرجى كتابة اسمك والبريد الالكتروني المسجل لدينا!');
            }

                        
                        
        }
}
