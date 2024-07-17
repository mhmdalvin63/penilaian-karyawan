<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KabagController extends Controller
{
    public function index(){
        if (Auth::user()->role != 'hrd') {
            return back();
        }
        $data = User::where('role','kabag')->get();
        $departemen = Departemen::all();
        return view('hrd.kabag',compact('data','departemen'));
    }
    public function submit(Request $request){
         User::create([
            'departemen_id'=>$request->departemen_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>'kabag',
            'password'=>Hash::make($request->password),
         ]);
        return redirect('/hrd/kabag')->with(['success'=>'Data Berhasil Ditambah.']);
    }
    public function edit($id){
        if (Auth::user()->role != 'hrd') {
            return back();
        }
        $data = User::find($id);
        return view('hrd.edit-kabag',compact('data'));
    }
    public function update(Request $request, $id){
        $data = User::find($id);
        $data->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        return redirect('/hrd/kabag')->with(['success'=>'Data Berhasil Diupdate.']);
    }
    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return redirect('/hrd/kabag')->with(['success'=>'Data Berhasil Dihapus.']);
    }
}
