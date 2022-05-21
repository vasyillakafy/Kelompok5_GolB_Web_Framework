<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function admin()
    {
        return view('admin', ['admins' => User::where("id_level", 1)->get()]);
    }
    public function tambah_admin()
    {
        return view('tambah_admin');
    }
    public function tambah_admin_process(Request $request)
    {
        request()->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $user = new User();
        $user->nama = $request->nama;
        $user->jk = $request->jk;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_telp;
        $user->id_level = 1; //1 level admin
        if ($user->save()) {
            $user->foto = "admin-" . $user->id . "." . $request->foto->extension();
            $request->foto->move(public_path('img'), "admin-" . $user->id . "." . $request->foto->extension());
            if ($user->save()) {
                return back()->with('success', 'Penambahan berhasil!');
            }
        }
        return back()->with('fail', 'Pendaftaran gagal, silahkan coba lagi');
    }
    public function hapus_admin(User $user)
    {
        if ($user->delete()) {
            File::delete('foto/' . $user->foto);
            return back()->with('success', 'Hapus admin ' . $user->nama . ' berhasil!');
        }
        return back()->with('fail', 'Gagal hapus admin, silahkan coba lagi');
    }

    public function user()
    {

        $users = users::all();
        return view('user', compact('users'));
    }
    public function tambah_user()
    {
        return view('tambah_user');
    }
    public function tambah_user_process(Request $request)
    {
        request()->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $data = users::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('img/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect('user')->with(['status' => 'Berhasil Menyimpan Data']);


        // $user->foto="user-".$user->id.".".$request->foto->extension();
        // $request->foto->move(public_path('foto'), "user-".$user->id.".".$request->foto->extension()); 
        // if($user->save()){
        //     return back()->with('success','Penambahan berhasil!'); 
        // }

    }
    public function hapus_user(users $user)
    {
        if ($user->delete()) {
            File::delete('foto/' . $user->foto);
            return back()->with('success', 'Hapus user ' . $user->nama . ' berhasil!');
        }
        return back()->with('fail', 'Gagal hapus user, silahkan coba lagi');
    }
}
