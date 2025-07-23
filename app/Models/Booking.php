<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
    'name',
    'email',
    'phone',
    'company',
    'service_id',
    'description',
    'service_price',
    'timeline',
    'status',
    ];


    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
