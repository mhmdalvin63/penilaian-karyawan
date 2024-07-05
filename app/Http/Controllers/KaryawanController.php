<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jabatan;
use App\Models\Penilaian;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index(){
        $data = User::with('jabatan','departemen')->where('role','karyawan')->get();
        $jabatan = Jabatan::all();
        $departemen = Departemen::all();
        return view('admin.karyawan',compact('data','jabatan','departemen'));
    }
    public function submit(Request $request){
        $user = User::where('email',$request->email)->first();
        if ($user != null) {
            return back()->with(['error'=>'Email sudah ada.']);
        }
         User::create([
            'jabatan_id'=>$request->jabatan_id,
            'departemen_id'=>$request->departemen_id,
            'name'=>$request->name,
            'nik'=>$request->nik,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
         ]);
        return redirect('/admin/karyawan')->with(['success'=>'Data Berhasil Ditambah.']);
    }
    public function edit($id){
        $data = User::find($id);
        $jabatan = Jabatan::all();
        $departemen = Departemen::all();
        return view('admin.edit-karyawan',compact('data','jabatan','departemen'));
    }
    public function update(Request $request, $id){
        $data = User::find($id);
        $data->update([
            'jabatan_id'=>$request->jabatan_id,
            'departemen_id'=>$request->departemen_id,
            'nik'=>$request->nik,
            'name'=>$request->name,
        ]);
        return redirect('/admin/karyawan')->with(['success'=>'Data Berhasil Diupdate.']);
    }
    public function delete($id){
        $data = User::find($id);
        $penilaian = Penilaian::where('user_id',$id)->get();
        $penilaian->each->delete();
        $data->delete();
        return redirect('/admin/karyawan')->with(['success'=>'Data Berhasil Dihapus.']);
    }
}
