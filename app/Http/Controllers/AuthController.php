<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if(Auth::check()){
            return redirect()->route('sitemanager.index');
        }

        return view('sitemanager.login');
    }

    public function login(Request $request)
    {
        $rules = [
            "name" => 'required|string',
            "password" => 'required|string',
        ];

        $messages = [
            "name.required" => "Email wajib diisi",
            // "email.email" => "Email tidak valid",
            "password.required" => "Password wajib diisi",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $input = [
            "name" => $request->name,
            "password" => $request->password
        ];

        Auth::attempt($input);

        if(Auth::check()){
            return redirect()->route('sitemanager.index');
        } else {
            Session::flash('error', 'Username atau Password Salah!!!');
            return redirect()->route('login');
        }

    }

    public function showFormRegister()
    {
        return view('sitemanager.register');
    }

    public function register(Request $request)
    {
        $rules = [
            "name" => "required|min:3|max:35",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed"
        ];

        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $save = $user->save();

        if($save){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
