<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JabatanController extends Controller
{
    public function index(){
        if (Auth::user()->role != 'hrd') {
            return back();
        }
        $data = Jabatan::all();
        return view('hrd.jabatan',compact('data'));
    }
    public function submit(Request $request){
         Jabatan::create([
            'jabatan'=>$request->jabatan,
         ]);
        return redirect('/hrd/jabatan')->with(['success'=>'Data Berhasil Ditambah.']);
    }
    public function edit($id){
        if (Auth::user()->role != 'hrd') {
            return back();
        }
        $data = Jabatan::find($id);
        return view('hrd.edit-jabatan',compact('data'));
    }
    public function update(Request $request, $id){
        $data = Jabatan::find($id);
        $data->update([
            'jabatan'=>$request->jabatan,
        ]);
        return redirect('/hrd/jabatan')->with(['success'=>'Data Berhasil Diupdate.']);
    }
    public function delete($id){
        $data = Jabatan::find($id);
        $data->delete();
        return redirect('/hrd/jabatan')->with(['success'=>'Data Berhasil Dihapus.']);
    }
}
