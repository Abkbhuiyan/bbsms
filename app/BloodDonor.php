<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodDonor extends Model
{
    protected $fillable = [
      'name','gender','nid_no','dob','blood_group_id','address','email','phone','password','image','status','approved_by'
    ];

    public function bloodGroup(){
        return $this->belongsTo(BloodGroup::class);
    }
}
