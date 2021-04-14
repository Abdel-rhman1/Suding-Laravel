<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Offer;
use Validator;
use Closure;
use Illuminate\Support\Facades\DB;

class CURD extends Controller
{
    public function index(){
        // return Session()->get('locale');
        $offers = Offer::select('ID' , 'photo','Name_'.Session()->get('locale') .' as Name' , 'Price' , 'details_'.Session()->get('locale') . ' as details')->get();

        return view('offers.all' , compact('offers'));
    }
    public function create(){
        return view('offers.create');
    }
    public function store(Request $res){
        // return $res->photo->getMimeType();
        $validate = Validator::make($res->all() , [
            'Name_ar' => 'required|max:100|unique:offers',
            'Name_en' => 'required|max:100|unique:offers',
            'Price' => 'required|numeric',
            'details_en'=>'required',
            'details_ar'=>'required',
            'photo' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ],
            [
                'Name_ar.required'=>__('messages.Offername_req'),
                'Name_en.required'=>__('messages.Offername_req'),
                'Price.required' => __('messages.Pricerequired'),
                'details_ar.required'=> __('messages.detailsrequired'),
                'details_en.required'=> __('messages.detailsrequired'),
                'Price.numeric' => __('messages.Pricenumeric'),
                'photo.required'=> 'Photo Must Be Passed',
                'photo.image' => 'the File Must Be file Only',
                'photo.mimes' => 'the file extension Must be (jpeg - png - jpg - svg)',
                'photo.max'=> 'The file size Must be less than 2048 Bytes',
                // 'details.min' => __('messages.detailsmin'),
            ]
        );
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInputs($res->all());
        }
        else{
            $path = 'Images/offers';
            $file_exten = $res->photo->getClientOriginalExtension();
            $imageName = time().'.'. $file_exten;
            Offer::create([
                'Name_ar' => $res->Name_ar,
                'Name_en' => $res->Name_en,
                'Price' => $res->Price,
                'details_ar'=> $res->details_ar,
                'details_en'=> $res->details_en,
                'photo' => $imageName,
            ]);
            $res-> photo-> move($path , $imageName);
            return redirect()->back()->with(["success"=>"Successfuly Insertion"]);
        }
    }
    public function edit($id){
        $off = Offer::find($id);
        if(!$off)
            return redirect()->back();
        $offer  = Offer::select('ID','Name_ar' ,'photo', 'Name_en' , 'Price' , 'details_ar' , 'details_en')->find($id);
        return view('offers.edit', compact('offer'));
    }
    public function Update(Request $request , $id){
        $affected = DB::table('offers')
              ->where('id', $id)
              ->update([
                  'Name_ar' => $request->Name_ar , 
                  'Name_en' => $request->Name_en ,
                  'Price' => $request->Price ,
                  'details_ar' => $request->details_ar,
                  'details_en' => $request->details_en]);
    return redirect()->back()->with(['updated' => 'Data Updated']);
    }
    public function delete($id){
        DB::table('offers')->where('ID', '=', $id)->delete();
        return redirect()->back()->with(['delete'=>'Record deleted']);

    }
}
