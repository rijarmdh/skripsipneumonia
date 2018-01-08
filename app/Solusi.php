<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solusi extends Model
{
     protected $fillable = [
        'nama', 
    ];

    public $timestamps = false;

     public function Gejala()
        {
        return $this->hasOne('App\Gejala');
        }
}
