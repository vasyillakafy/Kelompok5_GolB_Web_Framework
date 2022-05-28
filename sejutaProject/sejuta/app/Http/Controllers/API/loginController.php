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
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

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
    //login tanpa token
    // public function login(Request $request)
    // {
    //     $email = $request->input('email');
    //     $password = $request->input('password');

    //     $data = users::where('email', $email)->first();
    //     if($data){
    //         if(Hash::check($password, $data->password)){
    //             // $token = $data->createToken('authToken')->plainTextToken;
    //             return response()->json([
    //                 // 'status' => 'success',
    //                 'user' => $data,
    //             //  user  $data
    //             ], 200);
    //         }else{
    //             return response()->json([
    //                 // 'status' => 'error',
    //                 'message' => 'Password is incorrect'
    //             ], 401);
    //         }

    // try {
    //     $request->validate([
    //         'email' => 'email|required',
    //         'password' => 'required'
    //     ]);
    //     $loginType = filter_var($request->no_hp, FILTER_VALIDATE_EMAIL) ? 'email' : 'no_hp';

    //     $login = [
    //         $loginType => $request->no_hp,
    //         'password' => $request->password
    //     ];

    //     $data = users::all();
    //     if ($data) {
    //         return ResponseFormatter::createAPI(202, 'Success', $data);
    //     } else {
    //         return ResponseFormatter::createAPI(505, 'Failed');
    //     }
    // } catch (\Throwable $th) {
    //     return ResponseFormatter::createAPI(507, 'Request Failed');
    // }
    // }
    //     public function login(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'email' => 'email|required',
    //             'password' => 'required'
    //         ]);

    //         $credentials = request(['email', 'password']);
    //         if (!Auth::attempt($credentials)) {
    //             return ResponseFormatter::error([
    //                 'message' => 'Unauthorized'
    //             ], 'Authentication Failed', 500);
    //         }

    //         $user = User::where('email', $request->email)->first();
    //         if (!Hash::check($request->password, $user->password, [])) {
    //             throw new \Exception('Invalid Credentials');
    //         }

    //         $tokenResult = $user->createToken('authToken')->plainTextToken;
    //         return ResponseFormatter::success([
    //             'access_token' => $tokenResult,
    //             'token_type' => 'Bearer',
    //             'user' => $user
    //         ], 'Authenticated');
    //     } catch (Exception $error) {
    //         return ResponseFormatter::error([
    //             'message' => 'Something went wrong',
    //             'error' => $error,
    //         ], 'Authentication Failed', 500);
    //     }
    // }

    // /**
    //  * @param Request $request
    //  * @return \Illuminate\Http\JsonResponse
    //  * @throws \Exception
    //  */
    // public function register(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'fullname' => ['required', 'string', 'max:100'],
    //             'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
    //             'phone_number' => ['required', 'string', 'min:11', 'max:13', 'unique:users,phone_number'],
    //             'pin_number' => ['required', 'string', 'min:6', 'max:6'],
    //             'password' => ['required', 'string', 'min:6', 'max:100'],
    //         ]);

    //         users::create([
    //             'fullname' => $request->fullname,
    //             'email' => $request->email,
    //             'phone_number' => $request->phone_number,
    //             'pin_number' => $request->pin_number,
    //             'password' => Hash::make($request->password),
    //             'roles' => 'USER',
    //         ]);

    //         // $user = User::where('email', $request->email)->first();
    //         $user = users::where('phone_number', $request->phone_number)->first();

    //         $tokenResult = $user->createToken('authToken')->plainTextToken;

    //         return ResponseFormatter::success([
    //             'access_token' => $tokenResult,
    //             'token_type' => 'Bearer',
    //             'user' => $user
    //         ], 'User Registered');
    //     } catch (Exception $error) {
    //         return ResponseFormatter::error([
    //             'message' => 'Something went wrong',
    //             'error' => $error,
    //         ], 'Authentication Failed', 500);
    //     }







    // public function index_user()
    // {
    //     $data = users::all();
    //     if ($data) {
    //         return ResponseFormatter::createAPI(202, 'Success', $data);
    //     } else {
    //         return ResponseFormatter::createAPI(505, 'Failed');
    //     }
    // }




    //     public function store(Request $request)
    //     {
    //         try {
    //             $request->validate([
    //                 'email' => 'email|required',
    //                 'password' => 'required'
    //             ]);

    //             $user = users::create([
    //                 'nama' => $request->nama,
    //                 'jk' => $request->jk,
    //                 'email' => $request->email,
    //                 'password' => $request->password,
    //                 'api_token' => $request->api_token,
    //                 'alamat' => $request->alamat,
    //                 'no_hp' => $request->no_hp,
    //                 'foto' => $request->foto,


    //             ]);
    //             $data = users::where('id', '=', $user->id)->get();

    //             if ($data) {
    //                 return ResponseFormatter::createAPI(202, 'Success', $data);
    //             } else {
    //                 return ResponseFormatter::createAPI(505, 'Failed');
    //             }
    //         } catch (Exception $error) {
    //             return ResponseFormatter::createAPI(507, 'Failed Request Data');
    //         }
    //     }

    //     public function show($id)
    //     {
    //         $data = users::where('id', '=', $id)->get();
    //         if ($data) {
    //             return ResponseFormatter::createAPI(202, 'Success', $data);
    //         } else {
    //             return ResponseFormatter::createAPI(505, 'Failed');
    //         }
    //     }

    //     public function update(Request $request, $id)
    //     {
    //         try {
    //             $request->validate([
    //                 'email' => 'required',
    //                 'password' => 'required'
    //             ]);

    //             $user = users::findOrFail($id);

    //             $user->update([
    //                 'nama' => $request->nama,
    //                 'jk' => $request->jk,
    //                 'email' => $request->email,
    //                 'password' => $request->password,
    //                 'api_token' => $request->api_token,
    //                 'alamat' => $request->alamat,
    //                 'no_hp' => $request->no_hp,
    //                 'foto' => $request->foto,


    //             ]);
    //             $data = users::where('id', '=', $user->id)->get();

    //             if ($data) {
    //                 return ResponseFormatter::createAPI(202, 'Success Update Data', $data);
    //             } else {
    //                 return ResponseFormatter::createAPI(505, 'Failed');
    //             }
    //         } catch (Exception $error) {
    //             return ResponseFormatter::createAPI(507, 'Failed Request Data');
    //         }
    //     }

    //     public function del($id)
    //     {

    //         $user = users::findOrFail($id);
    //         $data = $user->delete();
    //         if ($data) {
    //             return ResponseFormatter::createAPI(202, 'Success Destroy Data');
    //         } else {
    //             return ResponseFormatter::createAPI(505, 'Failed');
    //         }
    //     }
    // }







    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            $respon = [
                'status' => 'error',
                'msg' => 'Validator Error',
                'error' => $validate->errors(),
                'content' => null,
            ];
            return response()->json($respon, 201);
        } else {
            $credentials = request(['email', 'password']);
            $credentials = Arr::add($credentials, 'status', 'aktif');
            if (!Auth::attempt($credentials)) {
                $respon = [
                    'status' => 'error',
                    'msg' => 'Unauthorized',
                    'error' => null,
                    'content' => null,
                ];
                return response()->json($respon, 401);
            }

            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new Exception('Error in Login');
            }

            $tokenResult = $user->createToken('token-auth')->plainTextToken;
            $respon = [
                'status' => 'success',
                'msg' => 'Login Successfully',
                'error' => null,
                'content' => [
                    'status_code' => 200,
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                ]
            ];
            return response()->json($respon, 200);
        }
    }

    public function register(Request $request)
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
                'status' => 'aktif',

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

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token, 'Token Revoked');
    }
//mengecek user yang sedang login
    public function fetch(Request $request)
    {
        return ResponseFormatter::success($request->user(), 'Data profile user berhasil diambil');
    }
}
