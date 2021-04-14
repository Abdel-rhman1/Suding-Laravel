<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Offer;
class AJAXCobtroller extends Controller
{
    public function create(){
        return view ('AjaxOffers.create');
    }
    public function store(Request $res){
        // return $res->details_ar.' '.$res->details_en;
       // $imageName = time() . $res->photo->getClientOriginalExtension();
        $offer=Offer::create([
            'Name_ar' => $res->Name_ar,
            'Name_en' => $res->Name_en,
            'Price' => $res->Price,
            'details_ar'=>  $res->details_ar,
            'details_en'=> $res->details_en,
            //'photo' => $imageName,
        ]);
       // $res->photo ->move('/Images/offers' , $imageName);
        if($offer){
            return response()->json([
                'status' => true,
                'msg' => 'Inserted Succsefly',
            ]);
        }else{
        return response()->json([
            'status' => false,
            'msg' => 'Inserted Succsefly',
        ]);
        }
    }
    public function index(){
        $offer = DB::table('offers')->select('ID' , 'Name_' . Session()->get('locale') . ' as Name' , 'Price' , 'details_' .Session()->get('locale') .' as details')->get();
        return view('AjaxOffers.all' , compact('offer'));
    }
    public function delete(Request $res){
        $id =  $res->id;
        $affected = DB::table('offers')->where('ID' , $id)->delete();
        if($affected){
            return response()->json([
                'status' => true,
                'msg' => 'Deleted Succesfuly',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'msg' => 'Error In deleting',
            ]);
        }
    }
    public function edit($id){

        $offer = DB::table('offers')->find($id);
        if(!$offer){
            return "Not Found In Our dataBase";
        }else{
            return view('AjaxOffers.edit' , compact('offer'));
        }
    }
    public function update(Request $res){
        $offer = DB::table('offers')->where('ID' , '=' , $res->ID)->update([
            'Name_ar' => $res->Name_ar,
            'Name_en' => $res->Name_en,
            'Price' => $res->Price,
            'details_ar' => $res->details_ar,
            'details_en'=>$res->details_en,
        ]);
        if($offer){
            return response()->json([
                'status' => true,
                'msg' => 'Offer Updated Suffusfully',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'msg' => 'error in  Updating',
            ]);
        }
    }
}