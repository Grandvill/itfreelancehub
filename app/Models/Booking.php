<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name',
        'email',
        'service',
        'description',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
