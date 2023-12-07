<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view("register");
    }
    public function store(Request $request){
        $data = $request->validate([
            'nama' => 'required|max:255',
            'email' => ['required','email','unique:user'],
            'password' => 'required|min:3|max:255'
        ]);

        $user = User::create([
            'nama'=> $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('login');

    }
}
