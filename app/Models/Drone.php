<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'location_id',
        'start_date',
        'end_date'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
