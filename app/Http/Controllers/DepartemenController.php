<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penilaian;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartemenController extends Controller
{
    public function index(){
        if (Auth::user()->role != 'admin') {
            return back();
        }
        $data = Departemen::all();
        return view('admin.departemen',compact('data'));
    }
    public function submit(Request $request){
         Departemen::create([
            'departemen'=>$request->departemen,
         ]);
        return redirect('/admin/departemen')->with(['success'=>'Data Berhasil Ditambah.']);
    }
    public function edit($id){
        if (Auth::user()->role != 'admin') {
            return back();
        }
        $data = Departemen::find($id);
        return view('admin.edit-departemen',compact('data'));
    }
    public function update(Request $request, $id){
        $data = Departemen::find($id);
        $data->update([
            'departemen'=>$request->departemen,
        ]);
        return redirect('/admin/departemen')->with(['success'=>'Data Berhasil Diupdate.']);
    }
    public function delete($id){
        $data = Departemen::find($id);
        $data->delete();
        return redirect('/admin/departemen')->with(['success'=>'Data Berhasil Dihapus.']);
    }

    public function dep(){
        $user = Auth::user();
        if ($user != null) {
            if ($user->role == 'admin' || $user->role == 'hrd') {
                Auth::logout();
            }
        }
        $data = User::where('id',Auth::user()->id)->first();
        return view('frontend.departement',compact('data'));
    }

    public function download(Request $request){
        $data = Penilaian::where('user_id',Auth::user()->id)->with('user.departemen')->first();
        // dd($data->user);
        if ($data == null) {
            return back()->with(['error'=>'Anda belum mempunyai nilai.']);
        }

        $filename = "laporan_penilaian_".date('Y-m-d').".xls";		 
      header("Content-Type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename=\"$filename\"");

            if ($data->nilai_akhir > 4.1) {
                $data->status_nilai = 'Sempurna';
            } elseif ($data->nilai_akhir > 3.1) {
                $data->status_nilai = 'Baik';
            } elseif ($data->nilai_akhir > 2.1) {
                $data->status_nilai = 'Cukup';
            } else {
                $data->status_nilai = 'Kurang';
            }

        $current_year = date('Y');
        $bulan = date('m');
        
        $dataHtml = '<table border="1">
          <tr>
            <td colspan="3">Perusahaan</td>
            <td colspan="5">: PT. Mada Wikri Tunggal</td>
        </tr>
        <tr>
            <td colspan="3">Periode / Tahun</td>
            <td colspan="5">: '.$bulan.' / '.$current_year.'</td>
        </tr>
        <tr class="header">
           		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 height="51" align="center" valign=middle bgcolor="#CCFFCC"><b>No</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle bgcolor="#CCFFCC"><b>Nama</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle bgcolor="#CCFFCC"><b>NIK</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle bgcolor="#CCFFCC"><b>Jabatan</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 3px double #000000" rowspan=3 align="center" valign=middle bgcolor="#CCFFCC"><b>Divisi/Departemen</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 3px double #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=middle bgcolor="#CCFFCC"><b>Prestasi Kerja</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 3px double #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#CCFFCC"><b>Kedisiplinan Kerja</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 3px double #000000; border-right: 1px solid #000000" colspan=6 align="center" valign=middle bgcolor="#CCFFCC"><b>Kemampuan Kerja</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 3px double #000000; border-right: 1px solid #000000" colspan=5 align="center" valign=middle bgcolor="#CCFFCC"><b>Sikap Kerja</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle bgcolor="#FF99CC"><b>Total Point</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle bgcolor="#FF99CC"><b>Grade</b></td>
        	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 3px double #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=middle bgcolor="#FFFF99">NiLAI Akhir (NA)</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 3px double #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99">NiLAI Akhir (NA)</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 3px double #000000; border-right: 1px solid #000000" colspan=6 align="center" valign=middle bgcolor="#FFFF99">NiLAI Akhir (NA)</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 3px double #000000; border-right: 1px solid #000000" colspan=5 align="center" valign=middle bgcolor="#FFFF99">NiLAI Akhir (NA)</td>
        
        </tr>
        <tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 3px double #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99" sdval="1" sdnum="1033;">1</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99" sdval="2" sdnum="1033;">2</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99" sdval="3" sdnum="1033;">3</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99" sdval="4" sdnum="1033;">4</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 3px double #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99" sdval="5" sdnum="1033;">5</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 3px double #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99" sdval="6" sdnum="1033;">6</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99" sdval="7" sdnum="1033;">7</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99" sdval="8" sdnum="1033;">8</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99" sdval="9" sdnum="1033;">9</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99" sdval="10" sdnum="1033;">10</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99" sdval="11" sdnum="1033;">11</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 3px double #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99" sdval="12" sdnum="1033;">12</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99" sdval="13" sdnum="1033;">13</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99" sdval="14" sdnum="1033;">14</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99" sdval="15" sdnum="1033;">15</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFF99" sdval="16" sdnum="1033;">16</td>

       
    ';
        $dataHtml .= '</tr>';
            if(!empty($data))

                $dataHtml .= "<tr>
                    <td align=center>1</td>
                    <td align=center>".$data->user->name."</td>
                    <td align=center>".$data->user->nik."</td>
                    <td align=center>".$data->user->jabatan->jabatan."</td>
                    <td align=center>".$data->user->departemen->departemen."</td>
                    <td align=center>".$data->quality."</td>
                    <td align=center>".$data->workload."</td>
                    <td align=center>".$data->speed."</td>
                    <td align=center>".$data->achievement."</td>
                    <td align=center>".$data->kehadiran."</td>
                    <td align=center>".$data->planning."</td>
                    <td align=center>".$data->flexibility."</td>
                    <td align=center>".$data->inovasion."</td>
                    <td align=center>".$data->jobskill."</td>
                    <td align=center>".$data->potency."</td>
                    <td align=center>".$data->comprehensive_thingking."</td>
                    <td align=center>".$data->coopertative."</td>
                    <td align=center>".$data->responsibility."</td>
                    <td align=center>".$data->attitude."</td>
                    <td align=center>".$data->execution."</td>
                    <td align=center>".$data->moral_behavior."</td>
                    <td align=center>".$data->nilai_akhir."</td>
                    <td align=center>".$data->status_nilai."</td>";
                $dataHtml .= "</tr>";
        $dataHtml .= '</table>';
        
        echo $dataHtml;
    }
}
