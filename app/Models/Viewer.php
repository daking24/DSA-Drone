<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'gender',
        'service_no',
        'rank',
        'post',
        'phone_no',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
