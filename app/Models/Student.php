<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'ZCBM_Id';


    protected $fillable = [
        'Name',
        'Surname',
        'Email',
        'Phone_Number',
        'Qualification_Route',
        'Total_Tuition_Fees',
        'Discount',
        'Current_Level',
        'Start_Date',
        'Data_Entered_By',

    ];  
    public function get_students(){
        return $this::all();
    }
    
    public function store_data($request){
        $this::create($request->all());
    }
}
