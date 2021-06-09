<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'zcbm_invoices_seprate';
    protected $primarykey = 'id';

    protected $fillable =[
        'student_id',
        'current_level',
        'qualification_route',
        'ammount_paid',
        'total_ammount',
        'balance',
        'issued_by',
        'course_id',
        'fee_id',
    ];

    public function student(){
        return $this->hasOne('App\Models\Student');
    }
     public function course(){
        return $this->hasOne('App\Models\zcbm_cources');
    }
    public function fee(){
        return $this->hasOne('App\Models\zcbm_cources');
    }
}
