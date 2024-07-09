<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calculation extends Model
{
    use HasFactory;

    protected $table = 'calculation';

    protected $primaryKey = 'id_calculation';

    public $timestamps = false;

    protected $fillable = ['id_calculation', 'nama', 'calculation1', 'calculation2',
     'calculation3', 'calculation4','calculation5'];
}
