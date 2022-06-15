<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::get();
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
        $data = User::where('id', $id)->first();
        return response()->json($data, 200);
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

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $data = users::where('email', $email)->first();
        if($data){
            if($password == $data->password){
                // $token = $data->createToken('authToken')->plainTextToken;
                return response()->json([
                    'status' => 'success',
                    'user' => $data,
            

                
                ], 200);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Password is incorrect'
                ], 401);
            }
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid email or password'
            ], 404);
        }
        // print($data->id);
    }

    public function register(Request $request)
    {
        $data = new users();
        $data->nama = $request->input('nama');
        $data->email = $request->input('email');
        $data->password = Hash::make($request->input('password'));
        $data->save();
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully'
        ], 200);

    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token, 'Token Revoked');
    }
public function update_profile(Request $request , $id){
    $user = User::findOrFail($id);
    $user->update($request->all());
    return response()->json(['status' => 'ok', 'message' => 'Data Berhasil diupdate'], 201);

}
    
    public function updateProfile(Request $request , $id)
    {
    //     $data = $request->validate([
    //         'fullname' => ['required', 'string', 'max:100'],
    //         'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
    //         'phone_number' => ['required', 'string', 'min:11', 'max:13', 'unique:users,phone_number'],
    //         'pin_number' => ['required', 'string', 'min:6', 'max:6'],
    //         'roles' => ['string', 'in:USER,ADMIN,KARYAWAN'],
    //         'password' => ['string', new Password],
    //     ]);

    //     $user = Auth::user();
    //     $user->update($data);

    //     return ResponseFormatter::success($user, 'Profile Updated');
    // }


    // try {
    //     $request->validate([
    //         'nama' => ['required', 'string', 'max:255'],
    //         'username' => ['required', 'string', 'max:255', 'unique:users'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         // 'no_telp' => ['required', 'string', 'max:15'],
    //     ]);

    //     $user = Auth::user();
    //     $user->update([
    //         'id_level' => "3",
    //         'nama' => $request->nama,
    //         'jk' => $request->jk,
    //         'username' => $request->username,
    //         'email' => $request->email,
    //         'password' => $request->password,
    //         'password' => Hash::make($request->password),
    //         'alamat' =>  $request->alamat,
    //         'no_hp' => $request->no_hp,
    //         'foto' => $request->foto,
    //         'status' => 'aktif'
    //     ]);

    //     return ResponseFormatter::success($user, 'Profile Updated');
    // } catch (Exception $error) {
    //     return ResponseFormatter::error([
    //         'message' => 'something went wrong',
    //         'error' => $error
    //     ], 'Aunthentication Failed', 500);
    // }
}

    }

