<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\zcbm_cources;
use App\Models\zcbm_cource_fee;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;


class CoursesController extends Controller
{
    public function index(){
        $students =  DB::table('zcbm_course')
        ->select('zcbm_course.id','zcbm_course.fullname','zcbm_course.shortname',DB::raw('zcbm_cource_fees.price as price'))
        ->leftJoin('zcbm_cource_fees', 'zcbm_course.fee_id', '=', 'zcbm_cource_fees.fee_id')
        ->where('zcbm_course.id','>', '1')
        ->orderBy('id')
        ->Paginate(7, ['*'], 'course');
        $price =zcbm_cource_fee::all();

        // dd($students);
        // return view('invoice.invoiceIndex') ->with('cource' , $students)->with('price',$price);
        return view('Cources.courseIndex') ->with('cource' , $students)->with('price',$price);;
    }

    public function addPirce(Request $request, $c_id)
    {
        $request->validate([
        'price'=>'required|numeric|',
        'course'=> 'required',
        ]); 
        $price = $request->price;   
        $affecetd = DB::table('zcbm_course')
                ->where('id', $c_id)
                ->update(['fee_id' => $price]);
        return redirect()->route('CourseIndex')->withsuccess('Price Added to the Course Successfully!!');      
        
    }
}
