<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\zcbm_cources;
use App\Models\zcbm_cource_fee;
use App\Models\Invoice;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Query\JoinClause;


use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice_all = Invoice::find(1)->studentIn();
        $data2 = Student::all();
        dd($data2);
        dd($invoice_all);
        $Invoice = new Invoice;
        $student = $Invoice::find(1)->student;
        dd($student);
        return view('Invoice.invoiceIndex')->with('data', $invoice_all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all('ZCBM_Id', 'Name','Surname');
        $course = zcbm_cources::all('id', 'fullname');
        $total_fee =  DB::table('zcbm_course')
        ->select('zcbm_course.id','zcbm_course.fullname',DB::raw('zcbm_cource_fees.price as price'),DB::raw('zcbm_cource_fees.fee_id as fee_id'))
        ->leftJoin('zcbm_cource_fees', 'zcbm_course.fee_id', '=', 'zcbm_cource_fees.fee_id')
        ->where('zcbm_course.id','>', '1')
        ->orderBy('id')
        ->get();
        return view('Invoice.createInvoice')->with('student' , $students)->with('course_info', $course);
    }
    public function createInvoiceWithCourse($id){

    }
    public function getTotalPriceAjax(Request $request)
    {

        $course_id = $request->course_id;
        $course = DB::table('zcbm_course')->select('fee_id')->where('id', $course_id)->get();
        $coursef = $course[0]->fee_id;
        $fee_id = DB::table('zcbm_cource_fees')->select('zcbm_cource_fees.fee_id','zcbm_cource_fees.price')->where('fee_id','=', $coursef)->get();
    //     $course_fee = DB::table('zcbm_course')
    //    ->select('zcbm_course.id','zcbm_course.fullname',DB::raw('zcbm_cource_fees.price as price'),DB::raw('zcbm_cource_fees.fee_id as fee_id'))
    //    ->leftJoin('zcbm_cource_fees', 'zcbm_course.fee_id', '=', 'zcbm_cource_fees.fee_id')
    //     ->where('zcbm_course.fee_id', '=', $coursef)
    //     ->orderBy('id')
    //     ->get();
    if(isset($fee_id))
    {   
        $data = [
            'fee_id'=> $fee_id
        ];  
        return response()->json($data, 200); 
    }
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $invoice_data = $request->validate([
        'student_id' => 'required|numeric',
        'current_level'=> 'required',
        'qualification_route'=>'required',
        'course_id'=>'required|numeric|min:1',
        'total_ammount'=>'required',
        'Qualification_Route'=>'required',
        'due_date'=> 'required|date',
        // 'Total_Tuition_Fees'=>'required|numeric',
        'Current_Level'=>'required',
        'Discount'=>'numeric'
    ]);

    $invoices = Invoice::where('student_id','=', $request->student_id)->get();
    if(!$invoices->isEmpty()){
        $balance = $invoices->balance;
        if(isset($request->Discount)){
            $invoice_data['total_ammount']  = $invoice_data['total_ammount'] - $request->Discount;
        }
        $invoice_data['balance'] = $balance + $invoice_data["total_ammount"];  
    
    }
    else{
        if(isset($request->Discount)){
            $invoice_data['total_ammount']  = $invoice_data['total_ammount'] - $request->Discount;
        }
        $invoice_data['balance'] = 0;
        $invoice_data['ammount_paid'] = 0;
    }
    // dd($invoice_data);
        $invoice_data['fee_id'] = $request->fee_id;
        $invoice_data['issued_by'] = "zain";


    $store = new Invoice;
    $store::create($invoice_data);
    return redirect()->route('InvoiceIndex') ->withSuccess('Invoice Created Succcessfully!!');
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