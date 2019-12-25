<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateBloodRequest extends Model
{
    public function bloodGroup(){
        return $this->belongsTo(BloodGroup::class,'required_blood_group_id');
    }
    public function privateOrg(){
        return $this->belongsTo(VoluntaryOrganization::class,'org_id');
    }
}
