<?php

namespace App\Http\Controllers;

use App\Models\kelola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class kelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //kondisi ketika id_users = yang login dan status = belum diproses
        // $kelola_barang = kelola::where('id_users', Auth::user()->id)->where('status', 'diproses')->get();
        $kelola_barang = kelola::where('id_users', Auth::user()->id)->get();

        // if($kelola_barang != ""){
        //     $kelola_barang1 = kelola::where('id_users', Auth::user()->id)->where('status', 'belum diproses')->get();
        //     return view('kelola_barang', compact('kelola_barang1'));
        // }
        // if($kelola_barang != ""){
        //     $kelola_barang2 = kelola::where('id_users', Auth::user()->id)->where('status', 'diproses')->get();
        //     return view('kelola_barang', compact('kelola_barang2'));
        // }
        
        // if($kelola_barang != ""){
        //     $kelola_barang3 = kelola::where('id_users', Auth::user()->id)->where('status', 'dikirim')->get();
        //     return view('kelola_barang', compact('kelola_barang3'));
        // }
        
        // if($kelola_barang != ""){
        //     $kelola_barang4 = kelola::where('id_users', Auth::user()->id)->where('status', 'selesai')->get();
        //     return view('kelola_barang', compact('kelola_barang4'));
        // }
        // if($kelola_barang == ""){
        //     $kelola_barang = kelola::where('id_users', Auth::user()->id)->where('status', 'diproses')->get();
        //     return view('kelola_barang', compact('kelola_barang'));
        // }
        // if($kelola_barang == ""){
        //     $kelola_barang = kelola::where('id_users', Auth::user()->id)->where('status', 'dikirim')->get();
        //     return view('kelola_barang', compact('kelola_barang'));
        // }
        // if($kelola_barang == ""){
        //     $kelola_barang = kelola::where('id_users', Auth::user()->id)->where('status', 'selesai')->get();
        //     $kelola_barang1 = "";
        //     return view('kelola_barang', compact('kelola_barang'));
        // }

  

            return view('kelola_barang', compact('kelola_barang'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
    public function show($id)
    {
   
        // $kelola_barang = kelola::where('id_users', Auth::user()->id)->where('status', 'diproses')->get();
        $kelola_barang = kelola::where('id_users', Auth::user()->id)->where('id',$id)->get();

        return view('detail_kelola', compact('kelola_barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        // $data = kelola::where('id',$id)->where('status',$status)->first();
        // $kategori = kelola::find($id);
        // $kategori->kat = $request->kat;
        // $kategori->ukuran = $request->ukuran;
        // $kategori->gender = $request->gender;
        // $kategori->pemakai = $request->pemakai;
        // $kategori->email = $request->email;
        // $kategori->username = $request->username;
        // $kategori->password = $request->password;
        // $kategori->level_id = $request->level_id;
       
        // $kategori->save();
        // return redirect('kategori')->with(['status' => 'Berhasil Edit Data']);


        $data = kelola::where('id',$id)->first();
        $data->update($request->all());
        return redirect('kelola_barang');
   
        // if($kelola->status == "belum diproses"){
        //     $kelola->status = $request->"diproses";
        //     $kelola->save();
        //     return redirect('kelola_barang');
        // }elseif ($kelola->status == "diproses") {
        //     $kelola->status = $request->dikirim;
        //     $kelola->save();
        //     return redirect('kelola_barang');
        // }else{
        //     $kelola->save();
        // }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateTgl(Request $request){
        $data = kelola::where('id',Auth::user()->id)->first();

                                 
                                    //  return redirect('kelola_barang');

                                    //  $kategori = kategori::find($id);
                                     $data->tgl_kirim = $request->tgl_kirim;
                                    //  $kategori->ukuran = $request->ukuran;
                                    //  $kategori->gender = $request->gender;
                                    //  $kategori->pemakai = $request->pemakai;
                                     // $kategori->email = $request->email;
                                     // $kategori->username = $request->username;
                                     // $kategori->password = $request->password;
                                     // $kategori->level_id = $request->level_id;
                                    
                                     $data->save();
                                     return redirect('kelola_barang')->with(['status' => 'Berhasil Edit Data']);

    }
}
