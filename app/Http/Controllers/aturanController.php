<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aturan;
class aturanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('jabatan');
    }

    public function index()
    {
        $search = \Request::get('search');
        $aturan = Aturan::where('nama_aturan', 'like', '%'.$search.'%')
                    ->orWhere('suhu', 'like', '%'.$search.'%')
                    ->orWhere('pernafasan', 'like', '%'.$search.'%')
                    ->orWhere('usia', 'like', '%'.$search.'%')
                    ->orWhere('pao2', 'like', '%'.$search.'%')
                    ->orWhere('sistolik', 'like', '%'.$search.'%')
                    ->orWhere('ph', 'like', '%'.$search.'%')
                    ->orWhere('bun', 'like', '%'.$search.'%')
                    ->orWhere('natrium', 'like', '%'.$search.'%')
                    ->orWhere('glukosa', 'like', '%'.$search.'%')
                    ->orWhere('hematokrit', 'like', '%'.$search.'%')
                    ->orWhere('efusi_pleura', 'like', '%'.$search.'%')
                    ->orWhere('keganasan', 'like', '%'.$search.'%')
                    ->orWhere('penyakithati', 'like', '%'.$search.'%')
                    ->orWhere('jantung', 'like', '%'.$search.'%')
                    ->orWhere('serebrovaskular', 'like', '%'.$search.'%')
                    ->orWhere('ginjal', 'like', '%'.$search.'%')
                    ->orWhere('gangguan_kesadaran', 'like', '%'.$search.'%')
                    ->orWhere('pneumonia', 'like', '%'.$search.'%')
                    ->paginate(15);

        return view('Data Aturan.index', compact('aturan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data Aturan.create');
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
            'nama_aturan'=>'required|unique:aturans',
            ]);

        // $aturan    = Aturan::all();
        $create = Aturan::create($request->all());

        //KOMPOSISI ATURAN
       
        // $count  = count($aturan);

        // $selectaturan = array();

        //  for ($i=1; $i < $count; $i++) { 
        // $selectaturan["R".$i] = Aturan::where('nama_aturan', "R".$i)
        // ->where('suhu', $request->input('suhu')) 
        // ->where('nadi', $request->input('nadi'))
        // ->where('pernafasan', $request->input('pernafasan'))
        // ->where('usia', $request->input('usia'))
        // ->where('pao2', $request->input('pao2'))
        // ->where('sistolik', $request->input('sistolik'))
        // ->where('ph', $request->input('ph'))
        // ->where('bun', $request->input('bun'))
        // ->where('natrium', $request->input('natrium'))
        // ->where('glukosa', $request->input('glukosa'))
        // ->where('hematokrit', $request->input('hematokrit'))
        // ->where('efusi_pleura', $request->input('efusi_pleura'))
        // ->where('keganasan', $request->input('keganasan'))
        // ->where('penyakithati', $request->input('penyakithati'))
        // ->where('jantung', $request->input('jantung'))
        // ->where('serebrovaskular', $request->input('serebrovaskular'))
        // ->where('ginjal', $request->input('ginjal'))
        // ->where('gangguan_kesadaran', $request->input('gangguan_kesadaran')) 

        // ->pluck('pneumonia')->first();
        //  }

        return redirect(route('dataaturan.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_aturan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_aturan)
    {
        $aturan = Aturan::find($id_aturan);

        return view('Data Aturan.edit', compact('aturan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_aturan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_aturan)
    {
        
        Aturan::destroy($id_aturan); 

        return redirect(route('dataaturan.index'));   

    }
}
