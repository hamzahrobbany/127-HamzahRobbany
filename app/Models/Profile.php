<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'address',
        'date_of_birth',
        'bio',
        'profile_image',
    ];

    // Relationship with User model (One-to-One)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
