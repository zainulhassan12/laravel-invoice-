<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class zcbm_cources extends Model
{
    use HasFactory;
    protected $table = 'zcbm_course';
    protected $primarykey ='id';

    public function getPrices(){
        return $this->hasMany('App\Models\zcbm_cource_fee');
    }
    
}
