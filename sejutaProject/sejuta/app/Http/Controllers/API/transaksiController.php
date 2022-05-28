<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\kelola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kelola::with('barang')->with('user')->with('users')->get();
        return response()->json($data, 200);
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
        
    }

    public function createTransaksi(Request $request)
    {   
        // $transaski = kelola::where('id_user', Auth::user());
        // kelola::create($request->all());
        // $user = Auth::user()->id;
  

        kelola::create([
                            'id_users' => $request->id_users,
                            'id_barang' => $request->id_barang,
                            'id_user' => $request->id_user,
                            'foto_paket' => $request->foto_paket,
                            'tgl_kirim' => $request->tgl_kirim,
                            'tgl_terima' => $request->tgl_terima,
                            'status' => 'belum diproses'
                          
        
        
                        ]);
        return response()->json(['status' => 'ok', 'message' => 'Data data Berhasil ditambahkan'], 201);
    }

    public function updateTransaksi($id, Request $request)
    {
        $trans = kelola::findOrFail($id);
        $trans->update($request->all());
        return response()->json(['status' => 'ok', 'message' => 'Data Berhasil diupdate'], 201);
    }
    public function deleteTransaksi($id)
    {
        $user = kelola::findOrFail($id);
        $user->delete();
        return response()->json(['status' => 'ok', 'message' => 'Data data Berhasil dihapus'], 201);
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
        //
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
}
