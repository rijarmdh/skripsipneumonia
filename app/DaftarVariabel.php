<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarVariabel extends Model
{
    protected $fillable = ['nama'];

    protected $primayKey = ['id_variabel'];

    public $timestamps = false;
}
