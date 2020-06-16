<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomUser;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function save(Request $request){
    	$this->validate($request,[
            "name"=>"required|max:20",
            "email"=>"required|email|unique:custom_users",
            "password"=>"required|unique:custom_users|min:8"
        ]);
        CustomUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
    }
    public function loggin(Request $request){
    	$this->validate($request,[
            "email"=>"required|email",
            "password"=>"required|min:8"
        ]);
    	$user=CustomUser::where('email','=',$request->email)->first();
    	$emsg=[];
       if(!$user){
       	 $emsg['email']='Invalid Email Address';
       	 return $emsg;
       }
       if(Hash::check($request->password,$user->password)){
       	$emsg['success']='You are done';
       	 return $emsg;
       }
       $emsg['password']='Invalid Password';
       	 return $emsg;
    } 

    public function loggingshow(){
    	return view('start');
    }
    public function registershow(){
    	return view('start');
    }
}
