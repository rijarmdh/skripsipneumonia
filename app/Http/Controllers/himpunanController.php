<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Himpunan;
use DB;
class himpunanController extends Controller
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
        // $search = \Request::get('search');
        // $himpunan = Himpunan::where('id_himpunan', 'like', '%'.$search.'%')
        //             ->orWhere('namahimpunan', 'like', '%'.$search.'%')
        //             ->orWhere('batasbawah', 'like', '%'.$search.'%')
        //             ->orWhere('batastengaha', 'like', '%'.$search.'%')
        //             ->orWhere('batastengahb', 'like', '%'.$search.'%')
        //             ->orWhere('batasatas', 'like', '%'.$search.'%')
        //             ->paginate(15);

        // return view('Data Himpunan.index', compact('himpunan')); 

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data Himpunan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $himpunan   =   Himpunan::create($request->all());

        return redirect()->route('datahimpunan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_variabel)
    {
        $himpunan = Himpunan::where('id_variabel', $id_variabel)->get();
    
        return view('Data Himpunan.index', compact('himpunan'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_himpunan)
    {
        $himpunan = Himpunan::find($id_himpunan);

        return view('Data Himpunan.edit', compact('himpunan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_himpunan)
    {
        $himpunan   =  Himpunan::find($id_himpunan);
        
        $himpunan->update($request->all());     

        return redirect()->route('daftargejala.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_himpunan)
    {
        Himpunan::destroy($id_himpunan);


        return redirect()->route('datahimpunan.index');
        }
}
