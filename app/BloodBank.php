<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    protected $fillable = [
      'name','hospital_approval_number','latitude','longitude','address','password','email','approved_by','status'
    ];

    public function user(){
        return $this->belongsTo(Users::class);
    }
}
