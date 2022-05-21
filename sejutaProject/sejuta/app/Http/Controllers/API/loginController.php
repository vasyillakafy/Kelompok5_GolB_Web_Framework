<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // try {
        //     $request->validate([
        //         'email' => 'email|required',
        //         'password' => 'required'
        //     ]);

        //     $credentials = request(['email', 'password']);
        //     if (!Auth::attempt($credentials)) {
        //         return ResponseFormatter::error([
        //             'message' => 'Unauthorized'
        //         ], 'Authentication Failed', 500);
        //     }

        //     $user = users::where('email', $request->email)->first();
        //     if (!Hash::check($request->password, $user->password, [])) {
        //         throw new \Exception('Invalid Credentials');
        //     }

        //     // $tokenResult = $user->createToken('authToken')->plainTextToken;
        //     return ResponseFormatter::success([
        //         // 'access_token' => $tokenResult,
        //         // 'token_type' => 'Bearer',
        //         'user' => $user
        //     ], 'Authenticated');
        // } catch (Exception $error) {
        //     return ResponseFormatter::error([
        //         'message' => 'Something went wrong',
        //         'error' => $error,
        //     ], 'Authentication Failed', 500);
        // }

    }

    public function login(Request $request)
    {

        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);
            $loginType = filter_var($request->no_hp, FILTER_VALIDATE_EMAIL) ? 'email' : 'no_hp';

            $login = [
                $loginType => $request->no_hp,
                'password' => $request->password
            ];

            $data = users::all();
            if ($data) {
                return ResponseFormatter::createAPI(202, 'Success', $data);
            } else {
                return ResponseFormatter::createAPI(505, 'Failed');
            }
        } catch (\Throwable $th) {
            return ResponseFormatter::createAPI(507, 'Request Failed');
        }
    }



    public function index()
    {
        $data = users::all();
        if ($data) {
            return ResponseFormatter::createAPI(202, 'Success', $data);
        } else {
            return ResponseFormatter::createAPI(505, 'Failed');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            $user = users::create([
                'nama' => $request->nama,
                'jk' => $request->jk,
                'email' => $request->email,
                'password' => $request->password,
                'api_token' => $request->api_token,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'foto' => $request->foto,


            ]);
            $data = users::where('id', '=', $user->id)->get();

            if ($data) {
                return ResponseFormatter::createAPI(202, 'Success', $data);
            } else {
                return ResponseFormatter::createAPI(505, 'Failed');
            }
        } catch (Exception $error) {
            return ResponseFormatter::createAPI(507, 'Failed Request Data');
        }
    }

    public function show($id)
    {
        $data = users::where('id', '=', $id)->get();
        if ($data) {
            return ResponseFormatter::createAPI(202, 'Success', $data);
        } else {
            return ResponseFormatter::createAPI(505, 'Failed');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            $user = users::findOrFail($id);

            $user->update([
                'nama' => $request->nama,
                'jk' => $request->jk,
                'email' => $request->email,
                'password' => $request->password,
                'api_token' => $request->api_token,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'foto' => $request->foto,


            ]);
            $data = users::where('id', '=', $user->id)->get();

            if ($data) {
                return ResponseFormatter::createAPI(202, 'Success Update Data', $data);
            } else {
                return ResponseFormatter::createAPI(505, 'Failed');
            }
        } catch (Exception $error) {
            return ResponseFormatter::createAPI(507, 'Failed Request Data');
        }
    }

    public function del($id)
    {

        $user = users::findOrFail($id);
        $data = $user->delete();
        if ($data) {
            return ResponseFormatter::createAPI(202, 'Success Destroy Data');
        } else {
            return ResponseFormatter::createAPI(505, 'Failed');
        }
    }
}
