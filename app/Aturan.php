<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    protected $fillable = [
    	'nama_aturan','suhu', 'nadi', 'pernafasan', 'usia', 'pao2', 'sistolik', 'ph', 'bun', 'natrium', 'glukosa', 'hematokrit', 'efusi_pleura', 'keganasan', 'jantung', 'serebrovaskular', 'ginjal', 'gangguan_kesadaran', 'penyakithati' ,  'pneumonia',
    ];

    protected $primaryKey = 'id_aturan';

    protected $hidden = [
    'remember_token',
    ];
}
