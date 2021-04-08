<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
class SocialController extends Controller
{
    public function redirect($service){
        return Socialite::driver($service)->redirect();
    }
    public function callback(){
        return $user = Socialite::with('facebook')->user();
    }
}