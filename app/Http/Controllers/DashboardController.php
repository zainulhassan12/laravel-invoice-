<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = DB::table('zcbm_invoices_seprate')
        ->select('zcbm_invoices_seprate.*','students.Name','students.Surname',
       'zcbm_course.fullname','zcbm_cource_fees.price as price')
        ->Join('students', 'zcbm_invoices_seprate.student_id','=','students.ZCBM_Id')
        ->leftJoin('zcbm_course','zcbm_invoices_seprate.course_id','=','zcbm_course.id')    
        ->leftJoin('zcbm_cource_fees','zcbm_invoices_seprate.fee_id','=','zcbm_cource_fees.fee_id')
        ->get();
        $students = Student::all();
        return view('index')->with('data',$invoices)->with('Record', $students);
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
    public function destroy($id)
    {
        //
    }
}