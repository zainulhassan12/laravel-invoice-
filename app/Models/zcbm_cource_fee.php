<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class zcbm_cource_fee extends Model
{
    use HasFactory;
    protected $table = 'zcbm_cource_fees';
    protected $primarykey = 'id';

    public function getCourse(){
        return $this->hasOne('App\Models\zcbm_cources');
    }
}
