<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kategori;
use App\Models\User;
use App\Models\user1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::user()->id_level == 1) {
            $barang2 = barang::all();
            $user = User::all();
            $kategori = kategori::all();
            return view('barang', compact('barang2', 'user', 'kategori'));
        } else {
            $barang2 = barang::where('id_users',  Auth::user()->id)->get();
            $user = User::all();
            $kategori = kategori::all();
            return view('barang', compact('barang2', 'user', 'kategori'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ka = kategori::all();
        $user = User::all();

        return view('tambah_barang', compact('ka','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = barang::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('img/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect('barang')->with(['status' => 'Berhasil Menyimpan Data']);
       
   
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
        $barang = barang::where('id',$id)->get();
        $ka = kategori::all();
        $user = User::all();


        return view('edit_barang', compact('barang', 'ka', 'user'));

    

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
        $data = barang::where('id',$id)->first();
        $data->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('img/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect('barang')->with(['status' => 'Berhasil Mengubah Data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus data berdasarkan id
        $data = barang::where('id',$id)->first();
        $data->delete();

        return redirect('barang')->with(['status' => 'Berhasil Menghapus Data']);
    }

    // public function jumlahBarang(){
    //     $barang = barang::all();
    //     $jumlah = $barang->count();
    //     return view('dashboard', compact('jumlah'));
    // }
}
