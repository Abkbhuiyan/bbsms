<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodTransfusionHistory extends Model
{
    //
    protected $fillable = [
        'user_id','mo_id','donated_to','transfusion_type'
    ];

    public function medicalOfficer(){
        return $this->belongsTo(MedicalOfficer::class,'mo_id');
    }
}
