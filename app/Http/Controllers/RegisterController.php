<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);

        $name = $validatedData['name'];
        $email = $validatedData['email'];
        $password = $validatedData['password'];
        if ($validatedData == true) {
            return view('register.outlet', compact('name', 'email', 'password'));
        } else {
            return back()->withErrors($validatedData);
        }
    }
    public function outlet(Request $request)
    {
        $post = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required',
            'nama_usaha' => 'required',
            'lokasi_usaha' => 'required',
            'jenis_usaha' => 'required',
            'lama_operasi' => 'required',
        ]);
        User::create($post);
        if ($post == true) {
            return redirect('/');
        } else {
            return back()->withErrors($post);
        }
    }
}
