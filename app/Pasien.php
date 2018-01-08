<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model

{
     protected $fillable = [
        'nama', 'nama_panggilan', 'alamat', 'no_telepon', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'status_perkawinan', 'kewarganegaraan', 'agama', 'pekerjaan', 'email', 'pendidikan', 'nama_kerabat', 'hubungan', 'nomortelepon'  
    ];

    protected $primaryKey = 'id_pasien';

     protected $hidden = [
        'remember_token',
    ];

     public function Gejala()
        {
        return $this->hasMany('App\Gejala');
        } 

}
