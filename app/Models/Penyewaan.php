<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }

    // relasi ke tabel laptop
    public function laptop()
    {
        return $this->belongsTo(Laptop::class);
    }
}
