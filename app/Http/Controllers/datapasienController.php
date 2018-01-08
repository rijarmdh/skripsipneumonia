<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;


class datapasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
       
            $this->middleware('admin')->except('index', 'show');    
        
        
    }

    public function index()
    {
        $search = \Request::get('search');
        $pasien = Pasien::where('nama','like','%'.$search.'%')
                    ->orWhere('id_pasien', 'like', '%'.$search.'%')
                    ->orWhere('alamat', 'like', '%'.$search.'%')
                    ->orWhere('tempat_lahir', 'like', '%'.$search.'%')
                    ->orWhere('jenis_kelamin', 'like', '%'.$search.'%')
                    ->orWhere('pekerjaan', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhere('Pendidikan', 'like', '%'.$search.'%')

        ->paginate(10);

        return view('Data Pasien.index', compact('pasien'));  
     }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data Pasien.create');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'=>'required|string',
            'nama_panggilan'=>'required|string|unique:pasiens',
            'alamat'=>'required|max:255',
            'no_telepon' =>'required|max:20|unique:pasiens',
            'tempat_lahir' =>'max:25',
            'tanggal_lahir'=>'required|',
            'jenis_kelamin'=>'required',
            'status_perkawinan'=>'required',
            'kewarganegaraan' =>'required',
            'agama'=>'required',
            'pekerjaan'=>'max:20',
            'email' =>'max:25|email|unique:pasiens',
            'pendidikan'=>'max:20',
            'nama_kerabat'=>'max:50',
            'hubungan' =>'max:40',
            'nomortelepon' =>'|max:20',

            ]);
 
        Pasien::create($request->all());

        return redirect(route('datapasien.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pasien)
    {
        $pasien = Pasien::find($id_pasien);

        return view('Data Pasien.detail', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pasien)
    {
        $pasien = Pasien::find($id_pasien);
        
        return view('Data Pasien.edit', compact('pasien'));
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pasien)
    {
        $pasien = Pasien::find($id_pasien);
        $pasien->update($request->all());

        return redirect(route('datapasien.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pasien)
    {
        Pasien::destroy($id_pasien);

        return redirect()->route('datapasien.index');        
    }
}
