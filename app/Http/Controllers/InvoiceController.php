<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\zcbm_cources;
use App\Models\zcbm_cource_fee;

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
        $students = zcbm_cources::paginate(7);
        $price = zcbm_cources::find(1);
        return view('invoice.invoiceIndex') ->with('cource' , $students);
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
        $fee = zcbm_cource_fee::paginate(6);
        $cource = zcbm_cources::paginate(7);
        $data = Array(
            'fee' => $fee,
            'course' => $cource 
        );
        // $cources_fee = DB::select('id','fullname', )
        $cources_fee = DB::table('zcbm_course')->select('id','fullname',DB::raw('fee_id as price'))
        ->join('zcbm_cource_fees', 'zcbm_course.id', '=', 'zcbm_cource_fees.id')->get();
        dd($cources_fee);
        return view('prices.priceDashboard')->with('fee',$fee)->with('course', $cource );
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
