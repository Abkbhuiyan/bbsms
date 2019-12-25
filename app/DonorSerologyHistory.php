<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonorSerologyHistory extends Model
{
    protected $fillable = [
        'user_id','test_id','result','medical_officer_id'
    ];
    public function medicalOfficer(){
        return $this->belongsTo(MedicalOfficer::class);
    }
}
