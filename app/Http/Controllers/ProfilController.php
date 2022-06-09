<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\profil;
use App\Models\User;
use App\Models\order_details;
use DB;
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

        //
        $order = order::with('order_details')->where('user_id',Auth::user()->id)->get();
        // dd($order);
        return view('profil.myorder',['orders'=> $order]);
    }
    public function destroy($id){
        
        $order = order::find($id);
        if($order->status == 'قبول'){
            return redirect()->back()->with('status','عذرا لقد تم قبول طلبك وهو الان في مرحلة الشحن!');
            }else{
                $order->order_details()->delete();
                $order->delete();
                return redirect()->back()->with('status','تم الحذف من القائمة بنجاح');

            }
        
        

    }

    public function setting(){

        $user_id = Auth::user()->id;
        $profil = profil::find($user_id);
                // dd('test');
        // $a = 
        

        return view('profil.setting',compact('profil'));
    }
    public function new(){
        $user_id = Auth::user()->id;
        $profil = profil::find($user_id);
        if(!$profil){

            return view('profil.newprofil');
        }

    }
    public function new_store(Request $request){
        // dd($request->all());
        $request->validate([
            'username' => 'required|max:10|unique:profils|',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->image){
        $img_ex = $request->image->getClientOriginalExtension();
        $img_name = time() . '.'. $img_ex;
        $path = "storage/profil";
        $request->image ->move(public_path($path),$img_name);

        $profil = profil::create([
            'user_id' => Auth::user()->id,
            'username'=> $request->username,
            'title' =>$request->title,
            'profil_photo' => "storage/profil/" . $img_name,
        ]);


        }else{
            $profil = profil::create([
                'user_id' => Auth::user()->id,
                'username'=> $request->username,
                'title' =>$request->title,
            ]);

        }

        return redirect('/profil');

        

        


    }

    
    public function update(Request $request){
        //    dd($request->all());

           $request->validate([
            'name' =>  'max:30|required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        if($user->profil->user_id = Auth::user()->id){

            $user->update([
                'name'=> $request->name,
            ]);

            if($request->image){

                

                $img_ex = $request->image->getClientOriginalExtension();
                $img_name = time() . '.'. $img_ex;
                $path = "storage/profil";
                $request->image ->move(public_path($path),$img_name);

                $profil = profil::find($user->profil->id);
                $profil->profil_photo = "storage/profil/" . $img_name; 
                $profil->title = $request->title;
                $profil->save();


            }else{

                $profil = profil::find($user->profil->id);
                $profil->title = $request->title;
                $profil->save();
            }
        

        

       

        
        
        
        // $profil->username = Auth::user()->profil->username;
        // $profil->user_id = Auth::user()->id;
        // $profil->profil_photo = "storage/profil/" . $img_name;
        // $profil->title = $request->title;
        // $profil->save();

        return redirect()->back()->with('status','تم تحديث بيانات الملف الشخصي');
        }
    }
}
