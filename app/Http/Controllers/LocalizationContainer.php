<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class LocalizationContainer extends Controller
{
    public function changeLang(Request $res){
        if(App::getLocale() == 'en'){
            
            App::setLocale($res->lang);
            Session()->put('locale' , $res->lang);
        }else if(App::getLocale() == 'ar'){

            App::setLocale($res->lang);
            Session()->put('locale' , $res->lang);
        }
        return redirect()->back();
    }
}
