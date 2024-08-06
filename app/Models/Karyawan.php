<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relasi dengan model User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
