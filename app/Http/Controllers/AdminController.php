<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
class AdminController extends Controller
{
    public function login(){
        return view('Admin.login');
    }
    public function save(Request $res){
        $val = Validator::make($res->all(),[
            'email'=> 'bail|required',
            'password' => 'required|min:6',
        ],[
            'email.required' => 'mail is required',
            //'email.email' =>'email must contain @ and .' ,
            'password.required'=>'password is required',
            'password.min'=>'password must be greater than 6 characters',
        ]);
        if($val->fails()){
            return redirect()->back()->witherrors($val)->withInputs($res->all());
        }
        if(Auth::guard('admin')->attempt(['email'=> $res->email , 'password'=> $res->password])){
            return view('Admin.dash');
        }else{
            return back()->withInput($res->only('email'));
        }
    }
}
