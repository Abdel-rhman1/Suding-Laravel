<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Offer;
use Validator;
use Closure;
class CURD extends Controller
{
    public function index(){
        // return Session()->get('locale');
        $offers = Offer::select('ID' , 'Name_'.Session()->get('locale') .' as Name' , 'Price' , 'details_'.Session()->get('locale') . ' as details')->get();

        return view('offers.all' , compact('offers'));
    }
    public function create(){
        return view('offers.create');
    }
    public function store(Request $res){
        $validate = Validator::make($res->all() , [
            'Name_ar' => 'required|max:100|unique:offers',
            'Name_en' => 'required|max:100|unique:offers',
            'Price' => 'required|numeric',
            'details_en'=>'required',
            'details_ar'=>'required',
            ],
            [
                'Name_ar.required'=>__('messages.Offername_req'),
                'Name_en.required'=>__('messages.Offername_req'),
                'Price.required' => __('messages.Pricerequired'),
                'details_ar.required'=> __('messages.detailsrequired'),
                'details_en.required'=> __('messages.detailsrequired'),
                'Price.numeric' => __('messages.Pricenumeric'),
                // 'details.min' => __('messages.detailsmin'),
            ]
        );
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInputs($res->all());
        }
        else{
            Offer::create([
                'Name_ar' => $res->Name_ar,
                'Name_en' => $res->Name_en,
                'Price' => $res->Price,
                'details_ar'=> $res->details_ar,
                'details_en'=> $res->details_en,

            ]);
            return redirect()->back()->with(["success"=>"Successfuly Insertion"]);
        }
    }
    public function edit($id){
        $off = offer::find($id);
        if(!$off)
            return redirect()->back();
        $offer  = offer::select('Name_ar' , 'Name_en' , 'Price' , 'details_ar' , 'details_en')->find($id);
        return view('offers.edit', compact('offer'));
    }
}
