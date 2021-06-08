<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\zcbm_cources;
use App\Models\zcbm_cource_fee;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

class PriceController extends Controller
{
    public function NewPriceEntry(Request $request){
        $data = $request->validate([
            'price' => 'required|numeric'
        ]);
        $storing_data = new zcbm_cource_fee;
           $storing_data::create($data);
        return redirect()->route('PriceIndex')->withSuccess('Price is Addeed successfully!!');
    }

   public function priceIndex(){
       $fee = zcbm_cource_fee::paginate(6, ['*'], 'fee');
       $course_fee = DB::table('zcbm_course')
       ->select('zcbm_course.id','zcbm_course.fullname','zcbm_course.shortname',DB::raw('zcbm_cource_fees.price as price'))
       ->leftJoin('zcbm_cource_fees', 'zcbm_course.fee_id', '=', 'zcbm_cource_fees.fee_id')
        ->where('zcbm_course.id','>', '1')
        ->orderBy('id')
        ->Paginate(7, ['*'], 'course');

       $price =zcbm_cource_fee::all(); 
       return view('prices.priceDashboard')->with('fee',$fee)
                                           ->with('course_fee', $course_fee)
                                           ->with('price', $price);
                                           
   }
   

   // Price Monitor code start from here.

   
   public function addPircePriceIndex(Request $request, $c_id)
   {
       $request->validate([
       'price'=>'required|numeric|',
       'course'=> 'required',
       ]); 
       $price = $request->price;   
       $affecetd = DB::table('zcbm_course')
             ->where('id', $c_id)
             ->update(['fee_id' => $price]);
       return redirect()->route('PriceIndex')->withsuccess('Price Added to the Course Successfully!!');      
       
   }
   public function deletePrice(Request $request, $id)
   {
       $result =  zcbm_cource_fee::where('fee_id', $id)->delete();
        return redirect()->route('PriceIndex')->withSuccess("Price Entry deleted Successfully!!!");

   }
   public function updateModalShow(Request $request){
       return view('prices.updateModel');

   }
   public function updatePrice(Request $request, $id)
   {
       $updatedata = $request->validate([
           'price' => 'required|numeric'
       ]);
       if(isset($updatedata))
       {
           $affecetd = DB::table('zcbm_cource_fees')
             ->where('fee_id', $id)
             ->update(['price' => $updatedata]);

       };
       return redirect()->route('PriceIndex')->withSuccess("Price Updated Successfully!!!");
   }
}


// $abc=zcbm_cources::all();
       // dd($abc);

       // $students = DB::table('zcbm_course')->select('id','fullname', 'shortname', 'category')->where('id', '>', 1)->get();
       // $students = zcbm_cources::paginate(7);
       // $price = zcbm_cources::find(1);


        // if (URL::previous() === URL::route('InvoiceIndex')) { 
           // // return redirect()->route('InvoiceIndex')->withsuccess('Price Added to the Course Successfully!!');;
           // } 
       // else {
       // }
       // return redirect()->route('InvoiceIndex')->withsuccess('Price Added to the Course Successfully!!');