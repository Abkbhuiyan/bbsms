<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodTransfusionHistory extends Model
{
    //
    protected $fillable;

    public function medicalOfficer(){
        return $this->belongsTo(MedicalOfficer::class,'mo_id');
    }
}
