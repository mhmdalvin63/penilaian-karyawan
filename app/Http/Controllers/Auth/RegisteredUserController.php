<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Jabatan;
use Illuminate\View\View;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $data = Departemen::all();
        $jabatan = Jabatan::all();
        return view('auth.register',compact('data','jabatan'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $getUser = User::where('email',$request->email)->first();
        if ($getUser != null) {
            return back()->with(['error'=>'Email Sudah Terdaftar.']);
        }

        $user = User::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'email' => $request->email,
            'role' => 'karyawan',
            'jabatan_id' => $request->jabatan_id,
            'departemen_id' => $request->departemen_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with(['success'=>'Registrasi Berhasil Silahkan Login.']);
    }
}
