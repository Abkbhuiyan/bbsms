<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonorSerologyHistory extends Model
{
    protected $fillable=[];
    public function medicalOfficer(){
        return $this->belongsTo(MedicalOfficer::class);
    }
}
