<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\zcbm_cources;
use App\Models\zcbm_cource_fee;
use Illuminate\Database\Query\JoinClause;


use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students =  DB::table('zcbm_course')
        // ->select('zcbm_course.id','zcbm_course.fullname','zcbm_course.shortname',DB::raw('zcbm_cource_fees.price as price'))
        // ->leftJoin('zcbm_cource_fees', 'zcbm_course.fee_id', '=', 'zcbm_cource_fees.fee_id')
        // ->where('zcbm_course.id','>', '1')
        // ->orderBy('id')
        // ->Paginate(7, ['*'], 'course');
        // $price =zcbm_cource_fee::all();
        // return view('invoice.invoiceIndex');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

}