<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = kategori::all();
        return view('kategori' , compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        return view('edit_kategori', compact('kategori'));
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

            'kat' => 'required',
    		'ukuran' => 'required',
            'gender' => 'required',
    		'pemakai' => 'required',
            

    	]);
 
        kategori::create([
    		'kat' => $request->kat,
    		'ukuran' => $request->ukuran,
            'gender' => $request->gender,
    		'pemakai' => $request->pemakai,
           
    	]);
 
    	return redirect('kategori')->with(['status' => 'Berhasil Menyimpan Data']);
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
        $kategori = kategori::where('id',$id)->get();
        // return $kategori;
        return view('edit_kategori' , compact('kategori'));
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

            'kat' => 'required',
    		'ukuran' => 'required',
            'gender' => 'required',
    		'pemakai' => 'required',
            // 'email' => 'required',
            // 'username' => 'required',
            // 'password' => 'required',
            // 'level_id' => 'required',
    	]);
      
         $kategori = kategori::find($id);
            $kategori->kat = $request->kat;
            $kategori->ukuran = $request->ukuran;
            $kategori->gender = $request->gender;
            $kategori->pemakai = $request->pemakai;
    		// $kategori->email = $request->email;
            // $kategori->username = $request->username;
            // $kategori->password = $request->password;
            // $kategori->level_id = $request->level_id;
           
            $kategori->save();
            return redirect('kategori')->with(['status' => 'Berhasil Edit Data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = kategori::find($id);
        $kategori->delete();
        return redirect('kategori');
    }

   
}
