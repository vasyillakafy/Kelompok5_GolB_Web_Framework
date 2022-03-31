<?php

namespace App\Http\Controllers;

use App\Models\petugas;
use Illuminate\Http\Request;

class petugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $petugas = petugas::all();
        return view('petugas' , compact('petugas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('tambah_petugas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'nama_petugas' => 'required',
    		'jk' => 'required',
            'alamat' => 'required',
    		'no_telp' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level_id' => 'required',

    	]);
 
        petugas::create([
    		'nama_petugas' => $request->nama_petugas,
    		'jk' => $request->jk,
            'alamat' => $request->alamat,
    		'no_telp' => $request->no_telp,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'level_id' => $request->level_id
    	]);
 
    	return redirect('petugas')->with(['status' => 'Berhasil Menyimpan Data']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = petugas::where('id',$id)->get();
        // return $petugas;
        return view('edit_petugas' , compact('petugas'));
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
        $this->validate($request,[

            'nama_petugas' => 'required',
    		'jk' => 'required',
            'alamat' => 'required',
    		'no_telp' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level_id' => 'required',
    	]);
      
         $petugas = petugas::find($id);
            $petugas->nama_petugas = $request->nama_petugas;
            $petugas->jk = $request->jk;
            $petugas->alamat = $request->alamat;
            $petugas->no_telp = $request->no_telp;
    		$petugas->email = $request->email;
            $petugas->username = $request->username;
            $petugas->password = $request->password;
            $petugas->level_id = $request->level_id;
           
            $petugas->save();
            return redirect('petugas')->with(['status' => 'Berhasil Menyimpan Data']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = petugas::find($id);
        $petugas->delete();
        return redirect('petugas');
    }
}
