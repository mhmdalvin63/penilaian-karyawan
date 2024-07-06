<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;

class AdminController extends Controller
{
    public function login(){
        $user = Auth::user();
        if ($user != null) {
            return back();
        }
        return view('admin/login');
    }

    public function register_admin(){
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);
        return redirect('/admin/login')->with(['success'=>'role admin berhasil di daftarkan.']);
    }
    public function submit_login(LoginRequest $request)
    {
        
        $request->authenticate();

        $request->session()->regenerate();

        return redirect('/admin/karyawan');
    }
}
