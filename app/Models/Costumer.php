<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function penyewaans()
    {
        return $this->hasMany(Penyewaan::class);
    }

    public function servisan()
    {
        return $this->hasMany(Servisan::class);
    }
}
