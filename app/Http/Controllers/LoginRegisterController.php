<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginRegisterController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function homenaik()
    {
        return view('user.homenaik');
    }
    public function hometurun()
    {
        return view('user.hometurun');
    }
    public function usermakanan()
    {
        return view('user.makanan');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }


    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'jenisKelamin' => 'required',
            'alamat' => 'required',
            'noHp' => 'required',
            'target' => 'required',
            'password' => 'required|min:8|max:20|confirmed',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenisKelamin;
        $user->alamat = $request->alamat;
        $user->no_hp = $request->noHp;
        $user->target = $request->target;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($user) {
            return redirect()->route('auth.login')->with('success', 'Akun berhasil dibuat, silahkan melakukan proses login!');
        } else {
            return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
        }
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:20'
        ]);

        $credentials = $request->only('email', 'password');

        // Periksa kondisi blokir sebelum mencoba otentikasi
        $user = User::where('email', $request->email)->first();

        if ($user && $user->blokir) {
            return back()->with('failed', 'Akun Anda telah diblokir.');
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->level == 'user') {
                if ($user->target == 'naik') {
                    return redirect('/user/homenaik');
                } else {
                    return redirect('/user/hometurun');
                }
            } elseif ($user->level == 'admin') {
                return redirect('/admin/dashboard');
            }
        }

        return back()->with('failed', 'Maaf, akun Anda belum terdaftar. Silakan lakukan registrasi terlebih dahulu sebelum mencoba login. Terima kasih!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
