<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\zcbm_cources;
use App\Models\zcbm_cource_fee;
use App\Models\Invoice;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Query\JoinClause;


use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $invoice_all = Invoice::find(1)->studentIn();
        $invoices = DB::table('zcbm_invoices_seprate')
        ->select('zcbm_invoices_seprate.*','students.Name','students.Surname',
       'zcbm_course.fullname','zcbm_cource_fees.price as price')
        ->Join('students', 'zcbm_invoices_seprate.student_id','=','students.ZCBM_Id')
        ->leftJoin('zcbm_course','zcbm_invoices_seprate.course_id','=','zcbm_course.id')    
        ->leftJoin('zcbm_cource_fees','zcbm_invoices_seprate.fee_id','=','zcbm_cource_fees.fee_id')
        ->get();
        return view('Invoice.invoiceIndex')->with('data',$invoices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStudentAjax(Request $request){
        $id = $request->student_id;
        $student = Invoice::find($id)->studentIn;
        // dd($student);
        return response()->json(['student'=>$student]);
    }

    public function getAllStudentsInvoices(Request $request, $id){
        $_id = $id;
        $invoices = DB::table('zcbm_invoices_seprate')
        ->select('zcbm_invoices_seprate.*','students.Name','students.Surname',
       'zcbm_course.fullname','zcbm_cource_fees.price as price')
        ->Join('students', 'zcbm_invoices_seprate.student_id','=','students.ZCBM_Id')
        ->leftJoin('zcbm_course','zcbm_invoices_seprate.course_id','=','zcbm_course.id')    
        ->leftJoin('zcbm_cource_fees','zcbm_invoices_seprate.fee_id','=','zcbm_cource_fees.fee_id')
        ->where('student_id' ,'=', $_id)
        ->get();
        // dd($invoices);
        return response()->json(['Invoices' => $invoices]);
    }

    public function getCourseAjax(Request $request){
        $course =  Invoice::find($request->student_id)->course()->get(['fullname','shortname','startdate','id']);
        return response()->json(['course'=>$course]);
    }
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
         
        if(isset($request->Discount)){
            $invoice_data['total_ammount']  = $invoice_data['total_ammount'] - $request->Discount;
        }
        $invoice_data['balance'] = 0;
        $invoice_data['ammount_paid'] = 0;
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
    public function edit(Request $request, $id)
    {
        $invoice_data = $request->validate([
            'qualification_route'=>'required',
            'total_ammount'=>'required',
            'Qualification_Route'=>'required',
            'due_date'=> 'required|date',
            // 'Total_Tuition_Fees'=>'required|numeric',
            'current_level'=>'required',
            
        ]);
        $invoices = Invoice::where('id','=', $id)->get();
        if(!$invoices->isEmpty()){
            // dd($invoices[0]->balance);
            $balance =$invoices[0]->balance;
            if(isset($request->Discount) && isset($balance)){
                $invoice_data['total_ammount']  = $invoice_data['total_ammount'] - $request->Discount;

            }
        
        }
            if(isset($invoice_data)){
            
            $affecetd = DB::table('zcbm_invoices_seprate')
             ->where('id', $id)
             ->update($invoice_data);
            };
        return redirect()->route('InvoiceIndex') ->withSuccess('Invoice Edited Succcessfully!!');
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
        $invoices = DB::table('zcbm_invoices_seprate')
        ->select('zcbm_invoices_seprate.*','students.Name','students.Surname',
       'zcbm_course.fullname','zcbm_cource_fees.price as price')
        ->Join('students', 'zcbm_invoices_seprate.student_id','=','students.ZCBM_Id')
        ->leftJoin('zcbm_course','zcbm_invoices_seprate.course_id','=','zcbm_course.id')    
        ->leftJoin('zcbm_cource_fees','zcbm_invoices_seprate.fee_id','=','zcbm_cource_fees.fee_id')
        ->where('zcbm_invoices_seprate.id' ,'=', $id)
        ->get();
        
        return view('Invoice.editInvoice')->with('Invoice', $invoices);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function addpayment(Request $request, $id){
        $payment = $request->validate([
            'payment'=>'numeric|required'
        ]);
        $updateInvoice = Invoice::find($id);
        $total_ammount = $updateInvoice->total_ammount;
        $balance = $updateInvoice->balance;
        $balance = $total_ammount - $payment['payment'];
        $ammount_paid = $payment['payment'];
        $affecetd = DB::table('zcbm_invoices_seprate')
        ->where('id', $id)
        ->update(['balance'  => $balance, 'ammount_paid'=> $ammount_paid]);
        // $updateInvoice->ammount_paid = $payment;
        // $updateInvoice->save();
        return redirect()->route('InvoiceIndex')->withSuccess('Payment added to invoice sucessfully!!');
        

    }
     public function destroy($id)
    {
        $Invoice = Invoice::all();
        $deleteInvoice = $Invoice->find($id);
        $deleteInvoice->delete();
        return redirect()->route('InvoiceIndex')->withSuccess('Invoice Deleted Successfully');
    }
    public function invoiceDownload(Request $request,$id){
        $pdfdata= DB::table('zcbm_invoices_seprate')
        ->select('zcbm_invoices_seprate.*','students.Name','students.Surname','students.Email',
         'zcbm_course.fullname','zcbm_cource_fees.price')
        ->Join('students', 'zcbm_invoices_seprate.student_id','=','students.ZCBM_Id')
        ->leftJoin('zcbm_course','zcbm_invoices_seprate.course_id','=','zcbm_course.id') 
        ->leftJoin('zcbm_cource_fees','zcbm_invoices_seprate.fee_id','=','zcbm_cource_fees.fee_id')
        ->where('zcbm_invoices_seprate.id','=', $id)
        ->get();
        return view('Invoice.invoicepdf')->with('pdfdata',$pdfdata)->with('id', $id);
    }
    public function DownloadInvoice(Request $request, $id){
        
        $pdfdata= DB::table('zcbm_invoices_seprate')
        ->select('zcbm_invoices_seprate.*','students.Name','students.Surname','students.Email',
         'zcbm_course.fullname','zcbm_cource_fees.price as price')
        ->Join('students', 'zcbm_invoices_seprate.student_id','=','students.ZCBM_Id')
        ->leftJoin('zcbm_course','zcbm_invoices_seprate.course_id','=','zcbm_course.id')    
        ->leftJoin('zcbm_cource_fees','zcbm_invoices_seprate.fee_id','=','zcbm_cource_fees.fee_id')
        ->where('zcbm_invoices_seprate.id','=', $id)
        ->get();
        $date = date('y-m-d');
        $pdf = PDF::loadView('Invoice.pdf-download',compact('pdfdata','date'));
        return $pdf->download("Invoice-".$pdfdata[0]->Name."-".$pdfdata[0]->Surname."-".$date.".pdf");
    }


}