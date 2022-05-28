<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\users;
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

    public function updateProfile(Request $request)
    {
        $data = $request->validate([
            'fullname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
            'phone_number' => ['required', 'string', 'min:11', 'max:13', 'unique:users,phone_number'],
            'pin_number' => ['required', 'string', 'min:6', 'max:6'],
            'roles' => ['string', 'in:USER,ADMIN,KARYAWAN'],
            'password' => ['string', new Password],
        ]);

        $user = Auth::user();
        $user->update($data);

        return ResponseFormatter::success($user, 'Profile Updated');
    }

}
