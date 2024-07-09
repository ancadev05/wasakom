<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaptopTipe extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function laptopmerek()
    {
        return $this->belongsTo(LaptopMerek::class, 'laptop_merek_id', 'id');
    }
}
