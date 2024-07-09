<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inputan extends Model
{
    use HasFactory;

    protected $table = 'alternatif';

    protected $primaryKey = 'id_alternatif';

    public $timestamps = false;

    protected $fillable = ['id_chipset', 'nama_alternatif'];

}
