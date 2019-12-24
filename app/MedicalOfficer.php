<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class MedicalOfficer extends Authenticatable
{
    use Notifiable;
    protected $guard = 'mo';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function bloodBank(){
        return $this->belongsTo(BloodBank::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function donor_serology(){
        return $this->hasMany(DonorSerologyHistory::class);
    }
    public function transfusionHistory(){
        return $this->hasMany(BloodTransfusionHistory::class,'id');
    }
}
