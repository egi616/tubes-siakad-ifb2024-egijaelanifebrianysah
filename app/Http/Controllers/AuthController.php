<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        //
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email'=> 'required',
                'password' => 'required',
            ],

            [
                'email.required' => 'email wajib diisi',
                'password.required' => 'password wajib diisi',
                
            ],
        );

        $infoLogin = [
            'email'=> $request->email,
            'password'=> $request->password,
        ];

        if(Auth::attempt($infoLogin)){
            $user = Auth::user();

            if($user->role === 'admin'){
                return redirect()->route('admin.dosen');
            }elseif($user->role === 'mahasiswa'){
                return redirect()->route('mahasiswa.krs');
            }
        }else{
            return redirect('/')->withErrors('Email dan password tidak sesuai')->withInput();
        }
    }

    public function logout()
    {
        //
        Auth::logout();

        return redirect('');
    }
}
