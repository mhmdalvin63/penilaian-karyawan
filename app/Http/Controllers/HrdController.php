<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;

class HrdController extends Controller
{
    public function login(){
        // $user = Auth::user();
        // if ($user != null) {
        //     return back();
        // }
        return view('hrd/login');
    }

   
    public function submit_login(LoginRequest $request)
    {
        
        $request->authenticate();

        $request->session()->regenerate();

        return redirect('/hrd/karyawan');
    }
}
