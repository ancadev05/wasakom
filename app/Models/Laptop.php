<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function laptopmerek()
    {
        return $this->belongsTo(LaptopMerek::class, 'laptop_merek_id', 'id');
    }
    
    public function laptoptipe()
    {
        return $this->belongsTo(LaptopTipe::class, 'laptop_tipe_id', 'id');
    }

    public function laptopstatus()
    {
        return $this->belongsTo(LaptopStatus::class, 'laptop_status_id', 'id');
    }

    public function laptopkondisi()
    {
        return $this->belongsTo(LaptopKondisi::class, 'laptop_kondisi_id', 'id');
    }
}
