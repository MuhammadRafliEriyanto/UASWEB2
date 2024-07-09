<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    protected $table = 'sub_kriteria';

    protected $primaryKey = 'id_subkriteria';

    public $timestamps = false;

    protected $fillable = ['chipset_id', 'kode_kriteria', 'nama_kriteria', 'jenis_kriteria', 'bobot'];

    public function chipset()
    {
        return $this->belongsTo(Chipset::class);
    }
}



