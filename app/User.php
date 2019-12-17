<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    

    protected $fillable = [
        'name','gender','nid_no','dob','blood_group_id','address','email','phone','password','image','status','approved_by'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function bloodGroup(){
        return $this->belongsTo(BloodGroup::class);
    }
}
