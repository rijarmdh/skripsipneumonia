<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Himpunan extends Model
{
    protected $fillable = [
        'namahimpunan', 'batasbawah', 'batastengaha', 'batastengahb', 'batasatas', 
    ];

    protected $primaryKey = 'id_himpunan';
     protected $hidden = [
        'remember_token',
    ];

    public $timestamps   = false;

    
}
