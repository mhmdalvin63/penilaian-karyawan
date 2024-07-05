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
        $data = Penilaian::with('user')->where('user_id',Auth::user()->id)->get();
        return view('frontend.departement',compact('data'));
    }

    public function download(Request $request){
        $data = Penilaian::where('user_id',Auth::user()->id)->with('user.departemen')->get();
        // dd($data->user);
        if ($data == null) {
            return back()->with(['error'=>'Anda belum mempunyai nilai.']);
        }
        $filename = "laporan_penilaian_".date('Y-m-d').".xls";		 
      header("Content-Type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename=\"$filename\"");

        foreach ($data as $key) {
            if ($key->nilai_akhir > 4.1) {
                $key->status_nilai = 'Sempurna';
            } elseif ($key->nilai_akhir > 3.1) {
                $key->status_nilai = 'Baik';
            } elseif ($key->nilai_akhir > 2.1) {
                $key->status_nilai = 'Cukup';
            } else {
                $key->status_nilai = 'Kurang';
            }
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
            $no = 1;

            foreach($data as $key => $item) {
                $dataHtml .= "<tr>
                    <td align=center>".$no++."</td>
                    <td align=center>".$item->user->name."</td>
                    <td align=center>".$item->user->nik."</td>
                    <td align=center>".$item->user->jabatan->jabatan."</td>
                    <td align=center>".$item->user->departemen->departemen."</td>
                    <td align=center>".$item->quality."</td>
                    <td align=center>".$item->workload."</td>
                    <td align=center>".$item->speed."</td>
                    <td align=center>".$item->achievement."</td>
                    <td align=center>".$item->kehadiran."</td>
                    <td align=center>".$item->planning."</td>
                    <td align=center>".$item->flexibility."</td>
                    <td align=center>".$item->inovasion."</td>
                    <td align=center>".$item->jobskill."</td>
                    <td align=center>".$item->potency."</td>
                    <td align=center>".$item->comprehensive_thingking."</td>
                    <td align=center>".$item->coopertative."</td>
                    <td align=center>".$item->responsibility."</td>
                    <td align=center>".$item->attitude."</td>
                    <td align=center>".$item->execution."</td>
                    <td align=center>".$item->moral_behavior."</td>
                    <td align=center>".$item->nilai_akhir."</td>
                    <td align=center>".$item->status_nilai."</td>";
                $dataHtml .= "</tr>";
            }
        $dataHtml .= '</table>';
        
        echo $dataHtml;
    }
}
