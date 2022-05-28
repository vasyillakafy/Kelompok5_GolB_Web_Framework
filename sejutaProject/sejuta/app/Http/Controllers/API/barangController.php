<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\barang;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        //ambil data dari relasi kategori
        //select * from kategori inner join barang on kategori.id = barang.kategori_i
//ambil data dari with kategori

        $data = barang::with('kategori')->with('user')->get();
        return response()->json($data, 200);
    }

    public function getID($id)
    {
        $user = barang::findOrFail($id);
        return response()->json(['msg' => 'Data data Berhasil ditemukan', 'data' => $user], 200);
    }


    public function createBarang(Request $request)
    {
        barang::create($request->all());
        return response()->json(['status' => 'ok', 'message' => 'Data data Berhasil ditambahkan'], 201);
    }

    public function updateBarang($id, Request $request)
    {
        $user = barang::findOrFail($id);
        $user->update($request->all());
        return response()->json(['status' => 'ok', 'message' => 'Data Berhasil diupdate'], 201);
    }

    public function deleteBarang($id)
    {
        $user = barang::findOrFail($id);
        $user->delete();
        return response()->json(['status' => 'ok', 'message' => 'Data data Berhasil dihapus'], 201);
    }

   
    // public function index()
    // {
    //     // $data = barang::all();
    //     //memanggil field yang berelasi dengan model barang
    //     $data = barang::with('kategori')->with('user')->get();



    //     if ($data) {
    //         return response()->json([
    //            'data' => $data
    //         //    = $data,
    //         ]);
    //         // return ResponseFormatter::createAPI(202, 'Success', $data);
    //     } else {
    //         return ResponseFormatter::createAPI(505, 'Failed');
    //     }
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
