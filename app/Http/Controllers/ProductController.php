<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Models\product;
use App\Models\type_product;
use App\Models\likes;
use App\Models\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        if(!$request->type){
            $res = product::all();
            $type = type_product::all();
            $likes = likes::all();
            return view('home',['products' => $res,'type' =>$type,'likes'=>$likes]);
        }
        if($request){
            // dd($request->all());

            $res = product::where('type_products',$request->type)->get();
            $type = type_product::all();
            $likes = likes::all();
            return view('home',['products' => $res,'type' =>$type,'likes'=>$likes]);

        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
        $valid = product::find($id);
        // dd($valid);

        if($valid){
        $product = product::find($id);
        $comments = product::find($id)->comments()->get()->where('product_id',$id);
        // $product = product::with('comments')->get();
        // dd($product);
        return view('product.product',['product'=>$product,'comments'=> $comments]);
        }else{
            abort(404);
        }
    }

    public function search(Request $request){
        // dd($request);
        if(!empty($request->q)){
            $res= product::where('name','LIKE','%'. $request->q . '%')
            ->orwhere('title','LIKE','%'. $request->q . '%')->get();
            return view('product.search',['products'=>$res]);

        }else{
            return redirect()->back();

        }

    
    

        // dd($res);





    }
    // ////////////////////////////////////////////////////////////

    public function like(Request $request,$id){
        
        

        $product = product::find($id);
        // dd();

        $like = DB::table('likes')->where('product_id',$product->id)
        ->where('user_id',Auth::user()->id)
        ->first();
        // dd($like->like);
        
        if(!$like){
            
            $newlike = new likes;
            $newlike->product_id = $product->id;
            $newlike->user_id = Auth::user()->id;
            $newlike->like = 1;
            $newlike->save();

        }elseif($like->like == 1){
            DB::table('likes')
            ->where('product_id',$product->id)
            ->where('user_id',Auth::user()->id)
            ->delete();
        }elseif($like->like == 0){
            DB::table('likes')
            ->where('product_id',$product->id)
            ->where('user_id',Auth::user()->id)
            ->update(['like' => '1']);

        }

        return redirect()->back();
    

        
    
        }
        
        
    
        public function dis_like($id){
        $product = product::find($id);

        $dislike = DB::table('likes')->where('product_id',$product->id)
        ->where('user_id',Auth::user()->id)
        ->first();

        // dd($dislike);
        
        if(!$dislike){
            
            $newlike = new likes;
            $newlike->product_id = $product->id;
            $newlike->user_id = Auth::user()->id;
            $newlike->like = 0;
            $newlike->save();

        }elseif($dislike->like == 0){
            DB::table('likes')
            ->where('product_id',$product->id)
            ->where('user_id',Auth::user()->id)
            ->delete();
        }elseif($dislike->like == 1){
            DB::table('likes')
            ->where('product_id',$product->id)
            ->where('user_id',Auth::user()->id)
            ->update(['like' => '0']);

        }
        

        return redirect()->back();

    }
    

    public function commentadd(Request $request , $id){
        // dd($request->all());
        if(!empty($request->message)){
            comments::create([
                'user_id' => Auth::user()->id,
                'product_id' => $id,
                'comment' => $request->message
            ]);


        }
        return redirect()->back();

    }



}
