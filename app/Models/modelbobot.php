<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelbobot extends Model
{
    use HasFactory;

    protected $table = 'bobot';

    protected $primaryKey = 'id_bobot';

    public $timestamps = false;

    protected $fillable = ['users_id','w1', 'w2', 'w3',
     'w4', 'w5',];
}
