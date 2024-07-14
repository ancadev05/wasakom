<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaptopKondisi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function laptops()
    {
        return $this->hasMany(Laptop::class, 'id', 'laptop_kondisi_id');
    }
}
