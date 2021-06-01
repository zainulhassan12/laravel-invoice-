<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Model =new Student;
        $Students = $Model->get_students();
        // dd($Students);
        return view('students.studentsIndex')->with("Record",$Students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.addStudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'Name' => 'required|string|filled',
            'Surname' => 'required|string|filled',
            'Email'=> 'email:rfc,dns',
            'Phone_Number'=> 'digits_between:10,14',
            'Qualification_Route'=> 'required|string',
            'Total_Tuition_Fees' => 'required|numeric',
            'Discount' => 'required',
            'Current_Level' => 'string',
        ]);
        
        if (isset($data)){
            // $Model->store_data($data);
            $data['Start_Date'] = date('y-m-d');
            $data['Data_Entered_By'] = "zain-ul-hassan";
            $storing_data = new Student;
            $storing_data::create($data);
        }
        return redirect()->route('StudentHome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
        $students = Student::all() ;
        $student = $students->find($id);
        dd($student);
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
