<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['title', 'description', 'image', 'price'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}