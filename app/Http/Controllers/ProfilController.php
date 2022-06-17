<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\profil;
use App\Models\User;
use App\Models\order_details;
use DB;
use File;
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

    public function setting(){

        $user_id = Auth::user()->id;
        $profil = profil::find($user_id);
                // dd('test');
        // $a = 
        

        return view('profil.setting',compact('profil'));
    }
    public function new(){
        
        if(Auth::user()->profil){
            return view('profil.setting');
        }else{
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
            $profil = profil::find($user->profil->id);
            $profil->title = $request->title;
            
                if($request->hasFile('image')){
                    $img = $profil->profil_photo;
                    File::delete($img);
                    $img_ex = $request->image->getClientOriginalExtension();
                    $img_name = time() . '.'. $img_ex;
                    $path = "storage/profil";
                    $request->image ->move(public_path($path),$img_name);
                    $profil->profil_photo = "storage/profil/" . $img_name; 
                    
                }
        
                $profil->save();
        }

        return redirect()->back()->with('status','تم تحديث بيانات الملف الشخصي');
        }
    }

