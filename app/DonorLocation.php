<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonorLocation extends Model
{
    protected $fillable = [
        'donor_id',
        'lattitude',
        'longitude',
    ];
}
