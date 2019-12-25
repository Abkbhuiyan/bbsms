<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    //
    public function blodDonor(){
        return $this->hasMany(User::class);
    }
    public function privateDonor(){
        return $this->hasMany(User::class);
    }
    public function privateRequest(){
        return $this->hasMany(PrivateBloodRequest::class);
    }
}
