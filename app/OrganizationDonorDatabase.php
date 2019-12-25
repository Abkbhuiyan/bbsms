<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationDonorDatabase extends Model
{
    public function bloodGroup(){
        return $this->belongsTo(BloodGroup::class);
    }
}
