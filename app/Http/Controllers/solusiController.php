<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solusi;


class solusiController extends Controller
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
        $solusi = Solusi::all();

        return view('Data Solusi.index', compact('solusi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data Solusi.create');
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
            'nama'=>'required'
            ]);


        Solusi::create($request->all());

        return redirect(action('solusiController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $solusi = Solusi::find($id);

    //     return view('Data Solusi.detail', compact('solusi'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solusi = Solusi::find($id);

        return view('Data Solusi.edit', compact('solusi'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'nama'=>'required|max:25'
            ]);

        Solusi::find($id)->update($request->all());

        return redirect()->route('datasolusi.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Solusi::destroy($id);

        return redirect()->route('datasolusi.index');
    }
}
