<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\users;
use Exception;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function __invoke(Request $request)
    {

        try {
        request()->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'id_level' => '3',
            'nama' => request('nama'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'status' => 'aktif'

        ]);

        $user = User::where('email', $request->email)->first();

        $tokenResult = $user->createToken('api_token')->plainTextToken;

        return ResponseFormatter::success([
            'access_token' => $tokenResult,
            'token_type' => 'Bearer',
            'user' => $user
        ], 'User Registered');

     } catch (Exception $error) {
        return  ResponseFormatter::error([
            'message' => 'Something went wrong',
            'error' => $error,
        ], 'Authentication Failed', 500);
    }
}

        // return response('Anda Berhasil Registrasi');
       
    }

