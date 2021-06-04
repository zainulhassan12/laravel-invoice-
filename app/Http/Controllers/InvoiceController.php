<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\zcbm_cources;
use App\Models\zcbm_cource_fee;
use Illuminate\Database\Query\JoinClause;
use DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = DB::table('zcbm_course')->select('id','fullname', 'shortname', 'category')->where('id', '>', 1)->get();
        // $students = zcbm_cources::paginate(7);
        // $price = zcbm_cources::find(1);
        $students =  DB::table('zcbm_course')
        ->select('zcbm_course.id','zcbm_course.fullname','zcbm_course.shortname',DB::raw('zcbm_cource_fees.price as price'))
        ->leftJoin('zcbm_cource_fees', 'zcbm_course.id', '=', 'zcbm_cource_fees.fee_id')
        ->where('zcbm_course.id','>', '1')
        ->orderBy('id')
        ->Paginate(7, ['*'], 'course');
        $price =zcbm_cource_fee::all();
        // dd($price);
        return view('invoice.invoiceIndex') ->with('cource' , $students)->with('price',$price);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function priceIndex(){
        $fee = zcbm_cource_fee::paginate(3, ['*'], 'fee');
        // $course = zcbm_cources::paginate(7);
        // $cources_fee = DB::select('id','fullname', )
        $course_fee = DB::table('zcbm_course')
        ->select('zcbm_course.id','zcbm_course.fullname',DB::raw('zcbm_cource_fees.price as price'))
        ->leftJoin('zcbm_cource_fees', 'zcbm_course.id', '=', 'zcbm_cource_fees.fee_id')
        ->where('zcbm_course.id','>', '1')
        ->orderBy('id')
        ->Paginate(7, ['*'], 'course');
       
        
        return view('prices.priceDashboard')->with('fee',$fee)
                                            ->with('course_fee', $course_fee);
                                            
    }
    public function destroy($id)
    {
        
    }
    public function addPirce(Request $request)
    {

    }
    public function deletePirce(Request $request, $id)
    {

    }
    public function updatePirce(Request $request, $id)
    {

    }
}
