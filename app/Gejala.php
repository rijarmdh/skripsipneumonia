<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
      protected $fillable = [ 

      'id_pasien',  'suhu', 'nadi', 'pernafasan', 'usia', 'pao2', 'sistolik', 'ph', 'bun', 'natrium', 'glukosa', 'hematokrit', 'efusi_pleura',  'keganasan', 'jantung', 'serebrovaskular', 'ginjal', 'nilaiz', 'gangguan_kesadaran', 'penyakithati' , 'pneumonia','id_solusi'
    ];

      protected $primaryKey = 'id_gejala';

      protected $hidden = [
        'remember_token',
    ];

      //Gejala BelongsTo Pasien
      public function Pasien()
        {
        return $this->belongsTo('App\Pasien', 'id_pasien');
        }


        //Gejala Belongst To Solusi
        public function Solusi(){
          return $this->belongsTo('App\Solusi');
        }
}
