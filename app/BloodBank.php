<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class BloodBank extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
      'name','hospital_approval_number','latitude','longitude','address','password','email','approved_by','status'
    ];
    protected $guard = 'bb';
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function medicalOfficer(){
        return $this->hasMany(MedicalOfficer::class);
    }
}
