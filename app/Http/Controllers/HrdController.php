<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HrdController extends Controller
{
    public function index(){
        if (Auth::user()->role != 'admin') {
            return back();
        }
        $data = User::where('role','hrd')->get();
        return view('admin.hrd',compact('data'));
    }
    public function submit(Request $request){
         User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>'hrd',
            'password'=>Hash::make($request->password),
         ]);
        return redirect('/admin/hrd')->with(['success'=>'Data Berhasil Ditambah.']);
    }
    public function edit($id){
        if (Auth::user()->role != 'admin') {
            return back();
        }
        $data = User::find($id);
        return view('admin.edit-hrd',compact('data'));
    }
    public function update(Request $request, $id){
        $data = User::find($id);
        $data->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        return redirect('/admin/hrd')->with(['success'=>'Data Berhasil Diupdate.']);
    }
    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return redirect('/admin/hrd')->with(['success'=>'Data Berhasil Dihapus.']);
    }
}
