<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaptopMerek extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function laptops()
    {
        return $this->hasMany(Laptop::class, 'id', 'laptop_merek_id');
    }

    public function laptoptipes()
    {
        return $this->hasMany(LaptopTipe::class, 'id', 'laptop_merek_id');
    }
}
