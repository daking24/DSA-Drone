<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'state',
        'country',
        'radius',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function viewers()
    {
        return $this->hasMany(Viewer::class);
    }

    // location has many drones
    public function drones()
    {
        return $this->hasMany(Drone::class);
    }
}
