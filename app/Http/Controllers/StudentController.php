<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
Use Redirect;

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
        return redirect()->route('StudentIndex')->withsuccess("New Student has been added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = Student::all();
        $student = $students->find($id);
        // $query = Student::select('*')->where('ZCBM_Id', $id)->toSql();
        // dd($query);
        return view('students.viewStudent')->with('item', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Student::all();
        $student = $students->find($id);
        return view('students.updateSudent')->with('item', $student)->withsucess("Students Record is updated sucessfully!!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id ,Student $student)
    {
            $updatedata = $request->validate([
            'Name' => 'required|string|filled',
            'Surname' => 'required|string|filled',
            'Email'=> 'email:rfc,dns',
            'Phone_Number'=> 'digits_between:10,14',
            'Qualification_Route'=> 'required|string',
            'Total_Tuition_Fees' => 'required|numeric',
            'Discount' => 'required',
            'Current_Level' => 'string',
        ]);
        if(isset($updatedata)){
            $students = Student::all();
            $data = $students->find($id);
            $data->update($updatedata);
        };
          return redirect()->route('StudentIndex')->withsucess('Students Record is updated sucessfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = Student::all();
        $student = $students->find($id);
        $student->delete();
        return redirect()->route('StudentIndex')->withsuccess('Students Record is deleted sucessfully!!');
        // return Redirect::to("/student/students")->withSuccess('deleted sucessfully!!');
    
    }
}
