<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServisanTeknisi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function servisan()
    {
        return $this->belongsTo(Servisan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
