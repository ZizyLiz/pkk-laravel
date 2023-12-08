<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view("login");
    }
    public function store(Request $request){
        $request->validate([
            'email' => 'required',
            'password'=> 'required',
        ], [
            'email.required'=> 'Email Wajib Diisi',
            'password.required'=> 'Password Wajib Diisi',
        ]);

        $data = [
            'email'=> $request->email,
            'password'=> $request->password,
        ];

        if(Auth::attempt($data)){
            return redirect()->route('barang.index');
        } else{
            return redirect('')->with('Benerin bjir');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with(['success'=>'Berhasil cuy']);
    }
}

