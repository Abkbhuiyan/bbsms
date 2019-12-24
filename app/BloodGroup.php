<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    //
    public function blodDonor(){
        return $this->hasMany(User::class);
    }
}
