<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeKriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';

    protected $primaryKey = 'id_kriteria';

    public $timestamps = false;

    // guardede
    protected $guarded = [];

}
