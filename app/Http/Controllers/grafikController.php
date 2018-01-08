<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Gejala;
use Charts;
class grafikController extends Controller
{

	// public function index(){
	// 	return view('ltedashboard', compact('chart'));
	// }

	public function chartbyday(){
    $chart = \Charts::database(Pasien::all(), 'line', 'chartjs')
    	
    		// ->dimension(1000, 500)
    		->title('Jumlah Konsultasi Pasien')
    		->groupByDay();

    return view('ltedashboard')->with(compact('chart'));
    }
}
