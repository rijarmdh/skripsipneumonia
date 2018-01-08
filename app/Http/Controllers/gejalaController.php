<?php

namespace App\Http\Controllers;


// require '../vendor/autoload.php';

use Illuminate\Http\Request;
use App\Gejala;
use App\Himpunan;
use App\Aturan;
use App\Pasien;
use Illuminate\Support\Facades\DB;
use App\Solusi;
use Carbon;

class gejalaController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function __construct(){
		$this->middleware('jabatan')->only('create', 'hasilkonsultasi', 'hitung');
	}

	public function index(Request $request){   
	  
		// $rekammedis = Gejala::all();
		// $rekammedis = DB::table('gejalas')
		// 				->join('pasiens', 'gejalas.id_pasien', '=', 'pasiens.id_pasien')
		// 				->select('gejalas.*', 'pasiens.nama')
		// 				->get();

		$search	=	\Request::get('search');
		$rekammedis = Pasien::where('id_pasien', 'like', '%'.$search.'%')
						->orWhere('nama', 'like', '%'.$search.'%')
						->orWhere('alamat', 'like', '%'.$search.'%')
						->orWhere('tempat_lahir', 'like', '%'.$search.'%')
						->orWhere('tanggal_lahir', 'like', '%'.$search.'%')
						->orWhere('jenis_kelamin', 'like', '%'.$search.'%')
						->paginate(10);
		
		return view('Riwayat Rekam Medis.index', compact('rekammedis'));
	}

	public function riwayat($id_pasien){
		$riwayat = Gejala::where('id_pasien', $id_pasien)->get();

		return view('Riwayat Rekam Medis.riwayat', compact('riwayat'));
	}

	public function hasil(){
		$hasil = DB::table('gejalas')
						->join('pasiens', 'gejalas.id_pasien', '=', 'pasiens.id_pasien')					
						->select('gejalas.*', 'pasiens.nama')
		                ->latest()->first();

		return view('Hasil Konsultasi.hasil', compact('hasil'));
	}

	public function hasilkonsultasi(){
		$lastgejala = DB::table('gejalas')
						->join('pasiens', 'gejalas.id_pasien', '=', 'pasiens.id_pasien')					
						->select('gejalas.*', 'pasiens.nama')
		->latest()->first();

		return view('Hasil Konsultasi.index', compact('lastgejala'));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function tambahkonsultasi(){
		return view('');
	}

	public function create()
	{
		return view('Variabel Gejala.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
   
	public function hitung(Request $request){
	
		$tanggallahir = Pasien::where('id_pasien', $request->input('id_pasien'))->pluck('tanggal_lahir')->first();
		
		$now = date('d-m-Y');
		$diff = date_diff(date_create($tanggallahir), date_create($now))->format('%y');
		$diff = intval($diff);

		/// var_dump($now, $tanggallahir, $diff);die;

		//suhu
		$suhudingin =   $this->suhudingin($request->input('suhu'));
		$suhunormal =   $this->suhunormal($request->input('suhu'));
		$suhutinggi =   $this->suhutinggi($request->input('suhu'));
		
		$suhu['rendah'] = $suhudingin;
		$suhu['normal'] = $suhunormal;
		$suhu['panas'] = $suhutinggi;

		//nadi
		$nadirendah = $this->nadirendah($request->input('nadi'));
		$nadinormal = $this->nadinormal($request->input('nadi'));
		$naditinggi = $this->naditinggi($request->input('nadi'));  

		$nadi['rendah'] = 	$nadirendah;
		$nadi['normal'] =	$nadinormal;
		$nadi['tinggi'] =	$naditinggi;

		//pernafasan
		$pernafasanlemah = $this->pernafasanlemah($request->input('pernafasan'));
		$pernafasannormal = $this->pernafasannormal($request->input('pernafasan'));
		$pernafasancepat = $this->pernafasancepat($request->input('pernafasan'));

		$pernafasan['lemah'] = $pernafasanlemah;
		$pernafasan['normal'] = $pernafasannormal;
		$pernafasan['cepat'] = $pernafasancepat;
		
		//usia
		$usiamuda   = $this->usiamuda($diff);
		$usiadewasa = $this->usiadewasa($diff);
		$usialansia = $this->usialansia($diff);	

		$usia['muda'] = $usiamuda;
		$usia['dewasa'] = $usiadewasa;
		$usia['lansia'] = $usialansia;
		// var_dump($usia);die;

		//PAO2
		$pao2hipoksia = $this->pao2hipoksia($request->input('pao2'));
		$pao2normal = $this->pao2normal($request->input('pao2'));

		$pao2['hipoksia'] = $pao2hipoksia;
		$pao2['normal'] = $pao2normal;

		//SISTOLIK
		$sistolikrendah = $this->sistolikrendah($request->input('sistolik'));
		$sistoliknormal = $this->sistoliknormal($request->input('sistolik'));
		$sistoliktinggi = $this->sistoliktinggi($request->input('sistolik'));

		$sistolik['rendah'] = $sistolikrendah;
		$sistolik['normal'] = $sistoliknormal;
		$sistolik['tinggi'] = $sistoliktinggi;

		//PH
		$phasam = $this->phasam($request->input('ph'));
		$phnormal = $this->phnormal($request->input('ph'));
		$phbasa = $this->phbasa($request->input(' ph'));

		$ph['asam'] = $phasam;
		$ph['normal'] = $phnormal;
		$ph['basa'] = $phbasa;

		//BLOOD UREA NITROGEN
		$bunnormal = $this->bunnormal($request->input('bun'));
		$buntinggi = $this->buntinggi($request->input('bun'));

		$bun['normal'] = $bunnormal;
		$bun['tinggi'] = $buntinggi;

		//NATRIUM
		$natriumrendah = $this->natriumrendah($request->input('natrium'));
		$natriumnormal = $this->natriumnormal($request->input('natrium'));
		$natriumtinggi = $this->natriumtinggi($request->input('natrium'));

		$natrium['rendah'] = $natriumrendah;
		$natrium['normal'] = $natriumnormal;
		$natrium['tinggi'] = $natriumtinggi;

		//GLUKOSA
		$glukosarendah = $this->glukosarendah($request->input('glukosa'));
		$glukosanormal = $this->glukosanormal($request->input('glukosa'));
		$glukosatinggi = $this->glukosatinggi($request->input('glukosa'));

		$glukosa['rendah'] = $glukosarendah;
		$glukosa['normal'] = $glukosanormal;
		$glukosa['tinggi'] = $glukosatinggi;

		//HEMATOKRIT
		$hematokritrendah = $this->hematokritrendah($request->input('hematokrit'));
		$hematokritnormal = $this->hematokritnormal($request->input('hematokrit'));
		$hematokrittinggi = $this->hematokrittinggi($request->input('hematokrit'));

		$hematokrit['rendah'] = $hematokritrendah;
		$hematokrit['normal'] = $hematokritnormal;
		$hematokrit['tinggi'] = $hematokrittinggi;

		//EFUSI PLEURA
		$efusipleuraTIDAK = $this->efusitidak($request->input('efusi_pleura'));
		$efusipleuraYA = $this->efusiya($request->input('efusi_pleura'));
		
		$efusipleura['Ya'] = $efusipleuraYA;
		$efusipleura['Tidak'] = $efusipleuraTIDAK;

		//KEGANASAN
		$keganasantidak = $this->keganasantidak($request->input('keganasan'));
		$keganasanya = $this->keganasanya($request->input('keganasan'));

		$keganasan['Tidak'] = $keganasantidak;
		$keganasan['Ya'] = $keganasanya;

		//PENYAKIT HATI
		$penyakithatitidak = $this->penyakithatitidak($request->input('penyakithati'));
		$penyakithatiya = $this->penyakithatiya($request->input('penyakithati'));
		
		$penyakithati['Tidak'] =  $penyakithatitidak;
		$penyakithati['Ya'] = $penyakithatiya;
		
		//PENYAKIT JANTUNG
		$penyakitjantungtidak = $this->penyakitjantungtidak($request->input('jantung'));
		$penyakitjantungya = $this->penyakitjantungya($request->input('jantung'));

		$penyakitjantung['Ya'] = $penyakitjantungya;
		$penyakitjantung['Tidak'] = $penyakitjantungtidak;
		
		// Riwayat Serebrovaskular 
		$serebrovaskulartidak = $this->serebrovaskulartidak($request->input('serebrovaskular'));
		$serebrovaskularya = $this->serebrovaskularya($request->input('serebrovaskular'));

		$serebrovaskular['Ya'] = $serebrovaskularya;
		$serebrovaskular['Tidak'] = $serebrovaskulartidak;

		//RIWAYAT PENYAKIT GINJAL
		$ginjaltidak = $this->ginjaltidak($request->input('ginjal'));
		$ginjalya = $this->ginjalya($request->input('ginjal'));

		$ginjal['Ya'] = $ginjalya;
		$ginjal['Tidak'] = $ginjaltidak;
		
		//GANGGUAN KESADARAN
		$gangguankesadarantidak = $this->gangguankesadarantidak($request->input('gangguan_kesadaran'));
		$gangguankesadaranya = $this->gangguankesadaranya($request->input('gangguan_kesadaran'));
 	
 		$gangguankesadaran['Ya'] = $gangguankesadaranya;
		$gangguankesadaran['Tidak'] = $gangguankesadarantidak;
	
		//Memanggil Semua Data aturan
		$aturan = Aturan::all();

		$aturanhasil = array();
		// $predikat = array();
		// $nilaiz = array();

		//cari nilai minimum dari proses fuzzyfikasi dan berdasarkan aturan.
		foreach ($aturan as $key => $aturans) {
		
			$predikat[$aturans['nama_aturan']] = min(array(
				$usia[$aturans['usia']], 
				$keganasan[$aturans['keganasan']],
				$penyakitjantung[$aturans['jantung']], 
				$serebrovaskular[$aturans['serebrovaskular']], 
				$ginjal[$aturans['ginjal']], 
				$gangguankesadaran[$aturans['gangguan_kesadaran']],
				$penyakithati[$aturans['penyakithati']],
				$pernafasan[$aturans['pernafasan']],
				$sistolik[$aturans['sistolik']], 
				$suhu[$aturans['suhu']],
				$nadi[$aturans['nadi']],
				$ph[$aturans['ph']],
				$bun[$aturans['bun']],
				$natrium[$aturans['natrium']], 
				$glukosa[$aturans['glukosa']], 
				$hematokrit[$aturans['hematokrit']], 
				$pao2[$aturans['pao2']], 
				$efusipleura[$aturans['efusi_pleura']],				
				)
			);

			$pneumoniaberat = $this->pneumoniaberat($aturans['pneumonia'],$predikat[$aturans['nama_aturan']]);
			$pneumoniaringan = $this->pneumoniaringan($aturans['pneumonia'],$predikat[$aturans['nama_aturan']]);


			// nilai z tiap aturan
			if($aturans->pneumonia == 'berat'){
				$nilaiz[$aturans['nama_aturan']] = $pneumoniaberat ;	
			}
			else{
				$nilaiz[$aturans['nama_aturan']] = $pneumoniaringan;		
			}

			// dd($predikat, $nilaiz);die;
		}

		$hasilakhir = $this->defuzifikasi($predikat, $nilaiz);	

		//mengambil data himpunan pneumonia
		$batasbawahringan = Himpunan::where('namahimpunan', 'Tingkat Pneumonia Ringan')->pluck('batasbawah')->first();
		$batasatasringan = Himpunan::where('namahimpunan', 'Tingkat Pneumonia Ringan')->pluck('batasatas')->first();
		$batasbawahberat = Himpunan::where('namahimpunan', 'Tingkat Pneumonia Berat')->pluck('batasbawah')->first();
		$batasatasberat = Himpunan::where('namahimpunan', 'Tingkat Pneumonia Berat')->pluck('batasatas')->first();
		
		//kesimpulan penyakit
		if($hasilakhir >= $batasbawahringan && $hasilakhir <= 105){
			$kesimpulanpenyakit = 'Pneumonia ringan';
		}
		elseif($hasilakhir >= 105){
			$kesimpulanpenyakit = 'Pneumonia berat';
		}else{
			$kesimpulanpenyakit = 'tidak terprediksi';
		}
	 
		//penanganan dan saran perawatan
		 if($kesimpulanpenyakit == 'Pneumonia berat'){
		 	$solusi = Solusi::where('id', 1)->pluck('nama')->first();
		 }
		 else{
		 	$solusi = Solusi::where('id', 3)->pluck('nama')->first();
		 }

		 // debuging 

		// foreach ($predikat as $key => $value) {
		// $keys = 'R'.($key+1); //gadipake
		// $atas[] = $predikat[$key] * $nilaiz[$key]; //???????????????????????????
		// }

		// $defuzifikasi = array_sum($atas);
		// print_r($usia);
		// print_r($predikat);
		// print_r($nilaiz);
		// print_r($atas);
		// print_r(array_sum($predikat)); echo "<br>";
		// print_r($defuzifikasi);echo "<br>";
		// print_r($hasilakhir);echo "<br>";
		// print_r($kesimpulanpenyakit); echo "<br>";
		// print_r($solusi);
		// die();

		$gejala = new Gejala;
		$gejala->id_pasien = $request->input('id_pasien');
		$gejala->suhu = $request->input('suhu');
		$gejala->nadi = $request->input('nadi');
		$gejala->pernafasan = $request->input('pernafasan');
		$gejala->usia = $diff;
		$gejala->pao2 = $request->input('pao2');
		$gejala->sistolik = $request->input('sistolik');
		$gejala->ph = $request->input('ph');
		$gejala->bun = $request->input('bun');
		$gejala->natrium = $request->input('natrium');
		$gejala->glukosa = $request->input('glukosa');
		$gejala->hematokrit = $request->input('hematokrit');
		$gejala->efusi_pleura = $request->input('efusi_pleura');
		$gejala->keganasan = $request->input('keganasan');
		$gejala->penyakithati = $request->input('penyakithati');
		$gejala->jantung = $request->input('jantung');
		$gejala->serebrovaskular = $request->input('serebrovaskular');
		$gejala->ginjal = $request->input('ginjal');
		$gejala->gangguan_kesadaran = $request->input('gangguan_kesadaran');
		$gejala->nilaiz = $hasilakhir;
		$gejala->pneumonia = $kesimpulanpenyakit;
		$gejala->solusi = $solusi;
		$gejala->save();

		

		return redirect()->action('gejalaController@hasil');
	}

	//kompisisi aturan
	// public function pneumonia($predikat, $aturan){
	// 	$batasbawahringan = Himpunan::where('namahimpunan', 'Tingkat Pneumonia Ringan')->pluck('batasbawah')->first();
	// 	$batasatasringan = Himpunan::where('namahimpunan', 'Tingkat Pneumonia Ringan')->pluck('batasatas')->first();
	// 	$batasbawahberat = Himpunan::where('namahimpunan', 'Tingkat Pneumonia Berat')->pluck('batasbawah')->first();
	// 	$batasatasberat = Himpunan::where('namahimpunan', 'Tingkat Pneumonia Berat')->pluck('batasatas')->first();

	// 	// $aturans = Aturan::pluck('pneumonia')->first();
	// 	if($aturan->where('pneumonia', 'ringan')){
	// 		$nilaiz = round($predikat * ($batasatasberat + $batasbawahberat) + $batasbawahberat ,2);			
	// 	}else{
	// 		$nilaiz = round($batasatasringan - $predikat * ($batasatasringan - $batasbawahringan)  ,2)  ;			
	// 	}

	// 	return $nilaiz;
	// }

	public function pneumoniaringan($aturan, $predikat){		
		$batasbawahringan = Himpunan::where('namahimpunan', 'Tingkat Pneumonia Ringan')->pluck('batasbawah')->first();
		$batasatasringan = Himpunan::where('namahimpunan', 'Tingkat Pneumonia Ringan')->pluck('batasatas')->first();

		$nilaiz = round($batasatasringan - $predikat * ($batasatasringan - $batasbawahringan)  ,2);

		return $nilaiz;
	}

	public function pneumoniaberat($aturan, $predikat){
		//BATAS PNEUMONIA  BERAT
		$batasbawahberat = Himpunan::where('namahimpunan', 'Tingkat Pneumonia Berat')->pluck('batasbawah')->first();
		$batasatasberat = Himpunan::where('namahimpunan', 'Tingkat Pneumonia Berat')->pluck('batasatas')->first();

		$nilaiz = round($batasbawahberat + $predikat * ($batasatasberat - $batasbawahberat)  ,2); // direvisi
	
		return $nilaiz;
	}
	
	//HASIL AKHIR
	public function defuzifikasi($predikat, $nilaiz){
		foreach ($predikat as $key => $value) {
			$keys = 'R'.($key+1); //Gadipakai; :))))
			$atas[] = $predikat[$key] * $nilaiz[$key]; //?????????????????????????/
		}
		$pembagi = array_sum($atas);
			
		if($pembagi != 0){
			$defuzifikasi  = round($pembagi/array_sum($predikat), 2);
			echo "<script>alert('data berhasil ditambahkan')</script>";

		}else{

			echo "<script>alert('Gagal Melakukan Pemeriksaan karena tidak terdapat di aturan, silahkan tambahkan aturan yang sesuai terlebih dahulu');history.go(-1);</script>";	
		}
		return $defuzifikasi;
	}

	public function suhudingin($angka){
		$batasbawahsuhudingin = Himpunan::where('namahimpunan', 'SuhuRendah')->pluck('batasbawah')->first();
		$batasatassuhudingin = Himpunan::where('namahimpunan', 'SuhuRendah')->pluck('batasatas')->first();

		if($angka <= $batasbawahsuhudingin)//35
		{
			$suhudingin = 1;

		}elseif($angka >= $batasbawahsuhudingin && $angka <= $batasatassuhudingin)
		{
			$suhudingin = round(($batasatassuhudingin - $angka)/($batasatassuhudingin - $batasbawahsuhudingin), 2);
		}
		else{
			$suhudingin = 0;
		}

		return $suhudingin;
	}

	//SUHU
	public function suhunormal($angka){

		$batasbawahsuhunormal = Himpunan::where('namahimpunan', 'SuhuNormal')->pluck('batasbawah')->first();
		$batastengah1suhunormal = Himpunan::where('namahimpunan', 'SuhuNormal')->pluck('batastengaha')->first();
		$batastengah2suhunormal = Himpunan::where('namahimpunan', 'SuhuNormal')->pluck('batastengahb')->first();
		$batasatassuhunormal = Himpunan::where('namahimpunan', 'SuhuNormal')->pluck('batasatas')->first();

		if($angka <= $batasbawahsuhunormal)
		{
			$suhunormal = 0;

		}elseif($angka >= $batasbawahsuhunormal && $angka <= $batastengah1suhunormal){

			$suhunormal = round(($angka - $batasbawahsuhunormal)/($batastengah1suhunormal - $batasbawahsuhunormal), 2);

		}elseif( $angka >= $batastengah1suhunormal && $angka <= $batastengah2suhunormal){
			
			$suhunormal = 1;

		}elseif( $angka >= $batastengah2suhunormal && $angka <= $batasatassuhunormal){

			$suhunormal = round(($batasatassuhunormal - $angka)/($batasatassuhunormal -  $batastengah2suhunormal), 2);
		}else{

			$suhunormal = 0;

			}


		return $suhunormal;
	}

	public function suhutinggi($angka){

		$batasbawahsuhutinggi = Himpunan::where('namahimpunan', 'SuhuPanas')->pluck('batasbawah')->first();
		$batasatassuhutinggi = Himpunan::where('namahimpunan', 'SuhuPanas')->pluck('batasatas')->first();

		if($angka <= $batasbawahsuhutinggi){

			$suhutinggi =   0;

		}elseif($angka >= $batasbawahsuhutinggi && $angka <= $batasatassuhutinggi){

			$suhutinggi =  round(($angka - $batasbawahsuhutinggi)/($batasatassuhutinggi - $batasbawahsuhutinggi), 2);

		}else{ 

			$suhutinggi =   1;
		}

		return  $suhutinggi;

	}

	//NADI
	public function nadirendah($angka){

		$batasbawahnadirendah = Himpunan::where('namahimpunan', 'NadiRendah')->pluck('batasbawah')->first();
		$batasatasnadirendah = Himpunan::where('namahimpunan', 'NadiRendah')->pluck('batasatas')->first();

		if($angka <= $batasbawahnadirendah){

			$nadirendah = 1;

		}elseif ($angka >= $batasbawahnadirendah && $angka <= $batasatasnadirendah) {
			
			$nadirendah = round(($batasatasnadirendah - $angka)/($batasatasnadirendah - $batasbawahnadirendah), 2);

		}else{
			$nadirendah = 0;
		}

		return $nadirendah;
	}

	public function nadinormal($angka){

		$batasbawahnadinormal = Himpunan::where('namahimpunan', 'NadiNormal')->pluck('batasbawah')->first();
		$batastengahanadinormal = Himpunan::where('namahimpunan', 'NadiNormal')->pluck('batastengaha')->first();
		$batastengahbnadinormal = Himpunan::where('namahimpunan', 'NadiNormal')->pluck('batastengahb')->first();
		$batasatasnadinormal = Himpunan::where('namahimpunan', 'NadiNormal')->pluck('batasatas')->first();

		if($angka <= $batasbawahnadinormal)
		{
			$nadinormal = 0; 

		}elseif ($angka >= $batasbawahnadinormal  && $angka <= $batastengahanadinormal) {
			$nadinormal = round(($angka - $batasbawahnadinormal)/($batastengahanadinormal - $batasbawahnadinormal), 2);
		}elseif ($angka >= $batastengahanadinormal && $angka <= $batastengahbnadinormal) {
			$nadinormal = 1;
		}elseif ($angka >= $batastengahbnadinormal && $angka <= $batasatasnadinormal) {
			$nadinormal = round(($batasatasnadinormal - $angka)/($batasatasnadinormal - $batastengahbnadinormal), 2);
		}else{
			$nadinormal = 0;
		}

		return $nadinormal;
	}

	public function naditinggi($angka){
		
		$batasbawah = Himpunan::where('namahimpunan', 'NadiTinggi')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'NadiTinggi')->pluck('batasatas')->first();

		if($angka <= $batasbawah){
			$naditinggi = 0;
		}elseif ($angka >= $batasbawah && $angka <= $batasatas) 
		{
			$naditinggi = round(($angka - $batasbawah)/($batasatas - $batasbawah), 2);
		}else{
			$naditinggi = 1;
		}

		return $naditinggi;
	}

	//PERNAFASAN
	public function pernafasanlemah($angka){
		
		$batasbawah = Himpunan::where('namahimpunan', 'PernafasanLemah')->pluck('batasbawah')->first();	
		$batasatas = Himpunan::where('namahimpunan', 'PernafasanLemah')->pluck('batasatas')->first();			

		if($angka <= $batasbawah){
			$pernafasanlemah = 1;
		}elseif ($angka >= $batasbawah && $angka <= $batasatas) {
			$pernafasanlemah = round(($batasatas - $angka)/($batasatas- $batasbawah), 2);
		}else{
			$pernafasanlemah = 0;
		}

		return $pernafasanlemah;
	}

	public function pernafasannormal($angka){
		
		$batasbawah = Himpunan::where('namahimpunan', 'PernafasanNormal')->pluck('batasbawah')->first();
		$batastengaha = Himpunan::where('namahimpunan', 'PernafasanNormal')->pluck('batastengaha')->first();
		$batastengahb = Himpunan::where('namahimpunan', 'PernafasanNormal')->pluck('batastengahb')->first();
		$batasatas = Himpunan::where('namahimpunan', 'PernafasanNormal')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$pernafasannormal= 0;
		}elseif ($angka >= $batasbawah && $angka <= $batastengaha) {
			$pernafasannormal = round(($angka - $batasbawah)/($batastengaha - $batasbawah), 2);
		}elseif ($angka >= $batastengaha && $angka <= $batastengahb) {
			$pernafasannormal = 1;
		}elseif($angka >= $batastengahb && $angka <= $batasatas){
			$pernafasannormal = round(($batasatas - $angka)/($batasatas - $batastengahb), 2);
		}else{
			$pernafasannormal = 0;
		}

		return $pernafasannormal;
	}

	public function pernafasancepat($angka){
	

		$batasbawah = Himpunan::where('namahimpunan', 'PernafasanCepat')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'PernafasanCepat')->pluck('batasatas')->first();

		if($angka <= $batasbawah){
			$pernafasancepat = 0;
		}elseif($angka >= $batasbawah && $angka <= $batasatas){
			$pernafasancepat = round(($angka - $batasbawah)/($batasatas - $batasbawah), 2);
		}else{
			$pernafasancepat = 1;
		}

		return $pernafasancepat;
	}


	//USIA
	public function usiamuda($angka){
		// $batasbawah     = Himpunan::select('batasbawah')->where('namahimpunan','UsiaMuda');
		// $batasatas      = Himpunan::select('batasatas')->where('namahimpunan', 'UsiaMuda');

		$batasbawah = Himpunan::where('namahimpunan', 'UsiaMuda')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'UsiaMuda')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$usiamuda = 1;
		}
		elseif ($angka >= $batasbawah && $angka <= $batasatas) {
			$usiamuda = round(($batasatas - $angka)/($batasatas - $batasbawah), 2);
		}
		else{
			$usiamuda = 0;
		}

		return $usiamuda;
	}

	public function usiadewasa($angka){
		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'UsiaDewasa');
		// $batastengah = Himpunan::select('batastengaha')->where('namahimpunan', 'UsiaDewasa');
		// $batasatas= Himpunan::select('batasatas')->where('namahimpunan', 'UsiaDewasa');

		$batasbawah = Himpunan::where('namahimpunan', 'UsiaDewasa')->pluck('batasbawah')->first();
		$batastengah = Himpunan::where('namahimpunan', 'UsiaDewasa')->pluck('batastengaha')->first();
		$batasatas = Himpunan::where('namahimpunan', 'UsiaDewasa')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$usiadewasa = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batastengah){
			$usiadewasa = round(($angka - $batasbawah)/($batastengah - $batasbawah), 2);
		}
		elseif($angka >= $batastengah && $angka <= $batasatas){
			$usiadewasa = round(($batasatas - $angka)/($batasatas - $batastengah), 2); 
		}
		else{
			$usiadewasa = 0;
		}

		return $usiadewasa;
	}

	public function usialansia($angka){
		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'UsiaLansia');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'UsiaLansia');

		$batasbawah = Himpunan::where('namahimpunan', 'UsiaLansia')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'UsiaLansia')->pluck('batasatas')->first();
		

		if($angka <= $batasbawah){
			$usialansia = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$usialansia = round(($angka - $batasbawah)/($batasatas - $batasbawah), 2);
		}
		else{
			$usialansia = 1;
		}


		return $usialansia;
	}


	//PAO2
	public function pao2hipoksia($angka){
		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan','pao2Hipoksia');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'pao2hipoksia');

		$batasbawah = Himpunan::where('namahimpunan', 'pao2hipoksia')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'pao2hipoksia')->pluck('batasatas')->first();
		
		if($angka <= $batasbawah){
			$pao2hipoksia = 1;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$pao2hipoksia = round(($batasatas - $angka)/($batasatas- $batasbawah), 2);
		}
		else{
			$pao2hipoksia = 0;
		}

		return $pao2hipoksia;
	}

	public function pao2normal($angka){
		
		$batasbawah = Himpunan::where('namahimpunan', 'pao2Normal')->pluck('batasbawah')->first();
		$batastengaha = Himpunan::where('namahimpunan', 'pao2Normal')->pluck('batastengaha')->first();
		$batastengahb = Himpunan::where('namahimpunan', 'pao2Normal')->pluck('batastengahb')->first();
		$batasatas = Himpunan::where('namahimpunan', 'pao2Normal')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$pao2normal = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batastengaha){
			$pao2normal = round(($angka - $batasbawah)/($batastengaha - $batasbawah), 2);
		}
		elseif($angka >= $batastengaha && $angka <= $batastengahb){
			$pao2normal = 1;
		}
		elseif($angka >= $batastengahb && $angka <= $batasatas){
			$pao2normal = round(($batasatas - $angka)/($batasatas - $batastengahb), 2);
		}
		else{
			$pao2normal = 0;
		}

		return $pao2normal;
	}


	//SISTOLIK
	public function sistolikrendah($angka){
		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'sistolikRendah');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'sistolikRendah');

		$batasbawah = Himpunan::where('namahimpunan', 'sistolikRendah')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'sistolikRendah')->pluck('batasatas')->first();

		if($angka <= $batasbawah){
			$sisrendah = 1;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$sisrendah = round(($batasatas- $angka)/($batasatas - $batasbawah), 2);
		}
		else{
			$sisrendah = 0;
		}

		return $sisrendah;
	}

	public function sistoliknormal($angka){

		$batasbawah = Himpunan::where('namahimpunan', 'sistolikNormal')->pluck('batasbawah')->first();
		$batastengaha = Himpunan::where('namahimpunan', 'sistolikNormal')->pluck('batastengaha')->first();
		$batastengahb = Himpunan::where('namahimpunan', 'sistolikNormal')->pluck('batastengahb')->first();
		$batasatas = Himpunan::where('namahimpunan', 'sistolikNormal')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$sisnormal = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batastengaha){
			$sisnormal = round(($angka -$batasbawah)/($batastengaha - $batasbawah), 2);
		}
		elseif($angka >= $batastengaha && $angka <= $batastengahb){
			$sisnormal = 1;
		}
		elseif($angka >= $batastengahb && $angka <= $batasatas){
			$sisnormal = round(($batasatas - $angka)/($batasatas - $batastengahb), 2);
		}
		else{
			$sisnormal = 0;
		}

		return $sisnormal;
	}

	public function sistoliktinggi($angka){
	
		$batasbawah = Himpunan::where('namahimpunan', 'SistolikTinggi')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'SistolikTinggi')->pluck('batasatas')->first();

		if($angka <= $batasbawah){
			$sistinggi = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$sistinggi = round(($angka - $batasbawah)/($batasatas - $batasbawah), 2);
		}
		else{
			$sistinggi = 1;
		}

		return $sistinggi;
	}


	//PH ASAM
	// B E L U M    	D I 		T  E   S  ~~~~~~~~~~~~~~~~~~~~~~~~
	public function phasam($angka){ 
		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'phAsam');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'phAsam');

		$batasbawah = Himpunan::where('namahimpunan', 'phAsam')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'phAsam')->pluck('batasatas')->first();

		if( $angka <= $batasbawah){
			$phasam = 1;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$phasam = round(($batasatas - $angka)/($batasatas - $batasbawah), 2);
		}
		else{
			$phasam = 0;
		}

		return $phasam;
	}

	public function phnormal($angka){

		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'phNormal');
		// $batastengaha = Himpunan::select('batastengaha')->where('namahimpunan', 'phNormal');
		// $batastengahb = Himpunan::select('batastengahb')->where('namahimpunan', 'phNormal');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'phNormal');

		$batasbawah = Himpunan::where('namahimpunan', 'phNormal')->pluck('batasbawah')->first();
		$batastengaha = Himpunan::where('namahimpunan', 'phNormal')->pluck('batastengaha')->first();
		$batastengahb = Himpunan::where('namahimpunan', 'phNormal')->pluck('batastengahb')->first();
		$batasatas = Himpunan::where('namahimpunan', 'phNormal')->pluck('batasatas')->first();
		


		if($angka <= $batasbawah){
			$phnormal = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batastengaha){
			$phnormal = round(($angka - $batasbawah)/($batastengaha - $batasbawah), 2);
		}
		elseif($angka >= $batastengaha && $angka <= $batastengahb){
			$phnormal = 1;
		}
		elseif($angka >= $batastengahb && $angka <=$batasatas ){

			$phnormal = round(($batasatas - $angka)/($batasatas - $batastengahb), 2);
		}
		else{
			$phnormal = 0;
		}

		return $phnormal;
	}

	public function phbasa($angka){

		$batasbawah = Himpunan::where('namahimpunan', 'phBasa')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'phBasa')->pluck('batasatas')->first();
			
		if($angka <= $batasbawah){
			$phbasa = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$phbasa = round(($angka - $batasbawah)/($batasatas - $batasbawah), 2);
		}
		else{
			$phbasa = 1;
		}

		return $phbasa;
	}


	//BLOOD UREA NITROGEN
	// public function bunrendah($angka){
	// 	// $batasbawah =   Himpunan::select('batasbawah')->where('namahimpunan', 'BUNrendah');
	// 	// $batasatas  =   Himpunan::select('batasatas')->where('namahimpunan', 'BUNrendah');

	// 	$batasbawah = Himpunan::where('namahimpunan', 'BUNrendah')->pluck('batasbawah')->first();
	// 	$batasatas = Himpunan::where('namahimpunan', 'BUNrendah')->pluck('batasatas')->first();
	
	// 	if($angka <= $batasbawah){
	// 		$bunrendah = 1;
	// 	}
	// 	elseif($angka >= $batasbawah && $angka <= $batasatas){
	// 		$bunrendah = round(($batasatas - $angka)/($batasatas- $batasbawah), 2);
	// 	}
	// 	else{
	// 		$bunrendah = 0;
	// 	}

	// 	return $bunrendah;
	// }

	public function bunnormal($angka){

		$batasbawah = Himpunan::where('namahimpunan', 'bunNormal')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'bunNormal')->pluck('batasatas')->first();

		if($angka <= $batasbawah){
			$bunnormal = 1;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$bunnormal = round(($batasatas - $angka)/($batasatas - $batasbawah), 2);
		}
		else{
			$bunnormal = 0;
		}

		return $bunnormal;
	}

	public function buntinggi($angka){
		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'bunTinggi');
		// $batasatas  = Himpunan::select('batasatas')->where('namahimpunan', 'bunTinggi');
		$batasbawah = Himpunan::where('namahimpunan', 'bunTinggi')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'bunTinggi')->pluck('batasatas')->first();

		if($angka <= $batasbawah){
			$buntinggi = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas ){
			$buntinggi = round(($angka - $batasbawah)/($batasatas -$batasbawah), 2);
		}
		else{
			$buntinggi = 1;
		}

		return $buntinggi;
	}


	//NATRIUM
	public function natriumrendah($angka){
		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'natriumRendah');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'natriumRendah');

		$batasbawah = Himpunan::where('namahimpunan', 'natriumRendah')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'natriumRendah')->pluck('batasatas')->first();

		if($angka <= $batasbawah){
			$natriumrendah = 1;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$natriumrendah = round(($batasatas - $angka)/($batasatas - $batasbawah), 2);
		}
		else{
			$natriumrendah = 0;
		}

		return $natriumrendah;
	}

	public function natriumnormal($angka){

		$batasbawah = Himpunan::where('namahimpunan', 'natriumNormal')->pluck('batasbawah')->first();
		$batastengaha = Himpunan::where('namahimpunan', 'natriumNormal')->pluck('batastengaha')->first();
		$batastengahb = Himpunan::where('namahimpunan', 'natriumNormal')->pluck('batastengahb')->first();
		$batasatas = Himpunan::where('namahimpunan', 'natriumNormal')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$natnormal = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batastengaha){
			$natnormal = round(($angka - $batasbawah)/($batastengaha - $batasbawah), 2);
		}
		elseif($angka >= $batastengaha && $angka <= $batastengahb){
			$natnormal = 1;
		}
		elseif($angka >= $batastengahb && $angka <= $batasatas){
			$natnormal = round(($batasatas - $angka)/($batasatas - $batastengahb), 2);
		}
		else{
			$natnormal = 0;
		}

		return $natnormal;
	}

	public function natriumtinggi($angka){

		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'natriumTinggi');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'natriumTinggi');

		$batasbawah = Himpunan::where('namahimpunan', 'natriumTinggi')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'natriumTinggi')->pluck('batasatas')->first();

		if($angka <= $batasbawah){
			$nattinggi = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$nattinggi= round(($angka - $batasbawah)/($batasatas - $batasbawah), 2);
		}
		else{
			$nattinggi = 1;
		}

		return $nattinggi;
	}


	//GLUKOSA
	public function glukosarendah($angka){
		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'glukosaRendah');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'glukosaRendah');

		$batasbawah = Himpunan::where('namahimpunan', 'glukosaRendah')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'glukosaRendah')->pluck('batasatas')->first();

		if($angka <= $batasbawah){

			$glukrendah = 1;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$glukrendah = round(($batasatas - $angka)/($batasatas - $batasbawah), 2);
		}
		else{
			$glukrendah = 0;
		}

		return $glukrendah;
	}

	public function glukosanormal($angka){
		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'glukosaNormal');
		// $batastengaha = Himpunan::select('batastengaha')->where('namahimpunan', 'glukosaNormal');
		// $batastengahb = Himpunan::Select('batastengahb')->where('namahimpunan', 'glukosaNormal');

		$batasbawah = Himpunan::where('namahimpunan', 'glukosaNormal')->pluck('batasbawah')->first();
		$batastengaha = Himpunan::where('namahimpunan', 'glukosaNormal')->pluck('batastengaha')->first();
		$batastengahb = Himpunan::where('namahimpunan', 'glukosaNormal')->pluck('batastengahb')->first();
		$batasatas = Himpunan::where('namahimpunan', 'glukosaNormal')->pluck('batasatas')->first();

		if($angka <= $batasbawah){
			$gluknormal = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batastengaha){
			$gluknormal = round(($angka - $batasbawah)/($batastengaha - $batasbawah), 2);
		}
		elseif($angka >= $batastengaha && $angka <= $batastengahb){
			$gluknormal = 1;
		}
		elseif($angka >= $batastengahb && $angka <= $batasatas){
			$gluknormal = round(($batasatas - $angka)/($batasatas - $batastengahb), 2);
		}
		else{
			$gluknormal = 0;
		}

		return $gluknormal;
	}

	public function glukosatinggi($angka){
		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'glukosaTinggi');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'glukosaTinggi');

		$batasbawah = Himpunan::where('namahimpunan', 'glukosaTinggi')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'glukosaTinggi')->pluck('batasatas')->first();

		if($angka <= $batasbawah ){
			$gluktinggi = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$gluktinggi = round(($angka - $batasbawah)/($batasatas - $batasbawah), 2);
		}
		else{
			$gluktinggi = 1;
		}

		return $gluktinggi;
	}


	//HEMATOKRIT
	public function hematokritrendah($angka){

		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'hematokritRendah');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'hematokritRendah');

		$batasbawah = Himpunan::where('namahimpunan', 'hematokritRendah')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'hematokritRendah')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$hemarendah = 1;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$hemarendah = round(($batasatas - $angka)/($batasatas - $batasbawah), 2);
		}
		else{
			$hemarendah = 0;
		}

		return $hemarendah;
	}

	public function hematokritnormal($angka){

		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'hematokritNormal');
		// $batastengaha = Himpunan::select('batastengaha')->where('namahimpunan', 'hematokritNormal');
		// $batastengahb = Himpunan::select('batastengahb')->where('namahimpunan', 'hematokritNormal');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'hematokritNormal');

		$batasbawah = Himpunan::where('namahimpunan', 'hematokritNormal')->pluck('batasbawah')->first();
		$batastengaha = Himpunan::where('namahimpunan', 'hematokritNormal')->pluck('batastengaha')->first();
		$batastengahb = Himpunan::where('namahimpunan', 'hematokritNormal')->pluck('batastengahb')->first();
		$batasatas = Himpunan::where('namahimpunan', 'hematokritNormal')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$hemanormal = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batastengaha){
			$hemanormal= round(($angka - $batasbawah)/($batastengaha - $batasbawah), 2);
		}
		elseif($angka >= $batastengaha && $angka <= $batastengahb){
			$hemanormal = 1;
		}
		elseif($angka >= $batastengahb && $angka <= $batasatas){
			$hemanormal = round(($batasatas - $angka)/($batasatas - $batastengahb), 2);
		}
		else{
			$hemanormal = 0;
		}

		return $hemanormal;
	}

	public function hematokrittinggi($angka){

		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'hematokritTinggi');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'hematokritTinggi');

		$batasbawah = Himpunan::where('namahimpunan', 'hematokritTinggi')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'hematokritTinggi')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$hematinggi = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$hematinggi = round(($angka - $batasbawah)/($batasatas - $batasbawah), 2);
		}
		else{
			$hematinggi = 1;
		}

		return $hematinggi;
	}

	//EFUSI PLEURA
	public function efusitidak($angka){
		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'efusipleuraTidak');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'efusipleuraTidak');

		$batasbawah = Himpunan::where('namahimpunan', 'efusipleuraTIDAK')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'efusipleuraTIDAK')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$efusitidak = 1;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$efusitidak = ($batasatas - $angka)/($batasatas- $batasbawah);
		}
		else{
			$efusitidak = 0;
		}

		return $efusitidak;
	}

	public function efusiya($angka){
		
		$batasbawah = Himpunan::where('namahimpunan', 'efusipleuraYA')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'efusipleuraYA')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$efusiya = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$efusiya = ($angka - $batasbawah)/($batasatas- $batasbawah);
		}
		else{
			$efusiya = 1;
		}

		return $efusiya;
	}


	//KEGANASAN
	public function keganasantidak($angka){
		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'keganasanTidak');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'keganasanTidak');

		$batasbawah = Himpunan::where('namahimpunan', 'keganasanTidak')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'keganasanTidak')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$keganasantidak = 1;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$keganasantidak = ($batasatas - $angka)/($batasatas - $batasbawah);
		}
		else{
			$keganasantidak = 0;
		}

		return $keganasantidak;
	}
	
	public function keganasanya($angka){
		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'keganasanYa');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'keganasanYa');

		$batasbawah = Himpunan::where('namahimpunan', 'keganasanYa')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'keganasanYa')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$keganasanya = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$keganasanya = ($angka - $batasbawah)/($batasatas - $batasbawah);
		}
		else{
			$keganasanya= 1;
		}

		return $keganasanya;
	}

	//RIWAYAT PENYAKIT HATI
	public function penyakithatitidak($angka){

		$batasbawah = Himpunan::where('namahimpunan', 'riwayat penyakit hati Tidak')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'riwayat penyakit hati Tidak')->pluck('batasatas')->first();

		if($angka <= $batasbawah ){

			$penyakithatitidak = 1;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){

			$penyakithatitidak = ($batasatas - $angka)/($batasatas - $batasbawah);
		}
		else{
			$penyakithatitidak = 0;
		}

		return $penyakithatitidak;

		dd($penyakithatitidak);
	}

	public function penyakithatiya($angka){

		$batasbawah = Himpunan::where('namahimpunan', 'riwayat penyakit hati Ya')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'riwayat penyakit hati Ya')->pluck('batasatas')->first();

		if($angka <= $batasbawah){
			$penyakithatiya = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$penyakithatiya = ($angka - $batasbawah)/($batasatas  - $batasbawah);
		}
		else{
			$penyakithatiya = 1;
		}

		return $penyakithatiya;
	}


	//RIWAYAT PEYAKIT JANTUNG TIDAK
	public function penyakitjantungtidak($angka){

		$batasbawah = Himpunan::where('namahimpunan', 'Riwayat Jantung Kongestif Tidak')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'Riwayat Jantung Kongestif Tidak')->pluck('batasatas')->first();


		if($angka <= $batasbawah ){

			$penyakitjantungtidak = 1;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){

			$penyakitjantungtidak = ($batasatas - $angka)/($batasatas - $batasbawah);
		}
		else{

			$penyakitjantungtidak = 0;
		}

		return $penyakitjantungtidak;
	}

	public function penyakitjantungya($angka){

		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'Riwayat Jantung Kongestif Ya');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'Riwayat Jantung Kongestif Ya');

		$batasbawah = Himpunan::where('namahimpunan', 'Riwayat Jantung Kongestif Ya')->pluck('batasbawah')->first();
		$batasatas= Himpunan::where('namahimpunan', 'Riwayat Jantung Kongestif Ya')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$penyakitjantungya = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$penyakitjantungya = ($angka - $batasbawah)/($batasatas  - $batasbawah);
		}
		else{
			$penyakitjantungya = 1;
		}

		return $penyakitjantungya;
	}


	//SEREBROVAKULAR
	public function serebrovaskulartidak($angka){

		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'Riwayat serebrovaskular Tidak');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'Riwayat serebrovaskular Tidak');

		$batasbawah = Himpunan::where('namahimpunan', 'Riwayat serebrovaskular Tidak')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'Riwayat serebrovaskular Tidak')->pluck('batasatas')->first();

		if($angka <= $batasbawah ){

			$serebrotidak = 1;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){

			$serebrotidak = ($batasatas - $angka)/($batasatas - $batasbawah);
		}
		else{

			$serebrotidak = 0;
		}

		return $serebrotidak;
	}

	public function serebrovaskularya($angka){

		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'Riwayat serebrovaskular Ya');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'Riwayat serebrovaskular Ya');

		$batasbawah = Himpunan::where('namahimpunan', 'Riwayat serebrovaskular Ya')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'Riwayat serebrovaskular Ya')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$serebroya = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$serebroya = ($angka - $batasbawah)/($batasatas  - $batasbawah);
		}
		else{
			$serebroya = 1;
		}

		return $serebroya;
	}

	//GINJAL
	public function ginjaltidak($angka){

		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'riwayat penyakit ginjal Tidak');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'riwayat penyakit ginjal Tidak');

		$batasbawah = Himpunan::where('namahimpunan', 'riwayat penyakit ginjal Tidak')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'riwayat penyakit ginjal Tidak')->pluck('batasatas')->first();

		if($angka <= $batasbawah ){

			$ginjaltidak = 1;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){

			$ginjaltidak = ($batasatas - $angka)/($batasatas - $batasbawah);
		}
		else{

			$ginjaltidak = 0;
		}

		return $ginjaltidak;
	}

	public function ginjalya($angka){

		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'riwayat penyakit ginjal Ya');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'riwayat penyakit ginjal Ya');

		$batasbawah = Himpunan::where('namahimpunan', 'riwayat penyakit ginjal Ya')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'riwayat penyakit ginjal Ya')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$ginjalya = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$ginjalya = ($angka - $batasbawah)/($batasatas  - $batasbawah);
		}
		else{
			$ginjalya = 1;
		}

		return $ginjalya;
	}


	//GANGGUAN KESADARAN
	public function gangguankesadarantidak($angka){

		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'Riwayat Gangguan Kesadaran Tidak');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'Riwayat Gangguan Kesadaran Tidak');

		$batasbawah = Himpunan::where('namahimpunan', 'Riwayat Gangguan Kesadaran Tidak')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'Riwayat Gangguan Kesadaran Tidak')->pluck('batasatas')->first();

		if($angka <= $batasbawah ){

			$sadartidak = 1;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){

			$sadartidak = ($batasatas - $angka)/($batasatas - $batasbawah);
		}
		else{

			$sadartidak = 0;
		}

		return $sadartidak;
	}

	public function gangguankesadaranya($angka){

		// $batasbawah = Himpunan::select('batasbawah')->where('namahimpunan', 'Riwayat Gangguan Kesadaran Ya');
		// $batasatas = Himpunan::select('batasatas')->where('namahimpunan', 'Riwayat Gangguan Kesadaran Ya');

		$batasbawah = Himpunan::where('namahimpunan', 'Riwayat Gangguan Kesadaran Ya')->pluck('batasbawah')->first();
		$batasatas = Himpunan::where('namahimpunan', 'Riwayat Gangguan Kesadaran Ya')->pluck('batasatas')->first();


		if($angka <= $batasbawah){
			$sadarya = 0;
		}
		elseif($angka >= $batasbawah && $angka <= $batasatas){
			$sadarya = ($angka - $batasbawah)/($batasatas  - $batasbawah);
		}
		else{
			$sadarya = 1;
		}

		return $sadarya;
	}

	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id_gejala)
	{
		$rekmed = Gejala::find($id_gejala);
		// $rekmed = DB::table('gejalas')
		// 			->join('pasiens', 'gejalas.id_pasien', '=', 'pasiens.id_pasien')
		// 			->select('gejalas.*', 'pasiens.nama')
		// 			->find($id_gejala)
		// 			->get();



		return view('Riwayat Rekam Medis.detail', compact('rekmed'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id_gejala)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id_gejala)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id_gejala)
	{
		Gejala::destroy($id_gejala);

		return redirect()->back();
	}
}
