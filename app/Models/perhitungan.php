<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perhitungan extends Model
{
    use HasFactory;

    protected $table = 'perhitungan';

    protected $primaryKey = 'id_perhitungan';

    public $timestamps = false;

    protected $fillable = ['id_perhitungan', 'nama','c1', 'c2', 'c3',
     'c3', 'c4','c5'];

}
