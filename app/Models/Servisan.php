<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servisan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function servisanteknisi()
    {
        return $this->hasMany(ServisanTeknisi::class);
    }

    public function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }

    public function laptopmerek()
    {
        return $this->belongsTo(LaptopMerek::class, 'laptop_merek_id', 'id');
    }

    // relasi ke tabel user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
