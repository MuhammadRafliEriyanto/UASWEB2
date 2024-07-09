<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chipset extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subKriteria()
    {
        return $this->hasMany(SubKriteria::class);
    }

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}

