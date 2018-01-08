<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user  = User::all();
        return view('Data User.index', compact('user'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data User.create');
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
            'name'=>'required}max:25',
            'email'=>'required|email|unique:users',
            'jabatan'=>'required',
            'password'=>'required|min:6|confirmed'
            ]);

       $user =  User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'jabatan' => $request['jabatan'],
            'password' => bcrypt($request['password']),
        ]);

       Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil Menyimpan $user->name"
            ]);

        return redirect(route('datauser.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('Data user.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);

        return view('Data user.edit')->with(compact('user'));
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
            'name'=>'required|max:25',
            'email'=>'required|email|unique:users',
            'jabatan'=>'required',
            'password'=>'required|min:6|confirmed'
            ]);
        

        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('datauser.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('datauser.index');
    }
}
