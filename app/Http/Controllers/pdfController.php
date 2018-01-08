<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gejala;
use App\Pasien;
use Illuminate\Support\Facades\DB;
use App\Solusi;
use \PDF;

class pdfController extends Controller
{
    public function getPDF($id_gejala){
    	$rekmed = Gejala::find($id_gejala);
    	$pdf = \PDF::loadview('Riwayat Rekam Medis.print', compact('rekmed'));

    	return $pdf->download('hasil.pdf');
    }
}
