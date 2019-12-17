<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class VoluntaryOrganization extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'group_type','group_name','group_contact','admin_contact','district','address','website_address','username','email','password','status','approved_by','logo'
    ];
    protected $guard = 'vOrg';
    protected $hidden = [
        'password', 'remember_token',
    ];
}
