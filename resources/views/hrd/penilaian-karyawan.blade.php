@extends('hrd.layout')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="w-100">List Penilaian Karyawan</h4>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#kategoriprodukmodal">
                            <span class="text">+ Tambah</span>
                        </button>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{session('success')}}
                        </div>
                    </div>
                    @endif
                    <div class="table-responsive">

                            <table class="table table-striped w-100" id="kategori">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nik</th>
                                        <th>Total Poin</th>
                                        <th>Grade</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($data->sortByDesc('nilai_akhir') as $item)
                                    <tr>
                                        <th scope="row">{{$no++}}</th>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->user->nik}}</td>
                                        <td>
                                            {{$item->nilai_akhir}}

                                        </td>
                                        <td>

                                            @if ($item->nilai_akhir > 4.1)
                                            <span class="btn btn-outline-success">Sempurna</span>
                                            @elseif(($item->nilai_akhir > 3.1))
                                            <span class="btn btn-outline-primary">Baik</span>
                                            @elseif(($item->nilai_akhir > 2.1))
                                            <span class="btn btn-outline-warning">Kurang</span>
                                            @else
                                            <span class="btn btn-outline-danger">Buruk</span>
                                            
                                            @endif
                                        </td>
                                        <td>
                                            <form action="/hrd/delete-penilaian/{{$item->id}}" method="POST" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini?');">
                                                @csrf
                                                @method('delete')
                                                <span><a class="btn btn-primary" href="/hrd/edit-penilaian/{{$item->id}}"><i class="far fa-edit"></i>Edit</a></span>
                                                <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
<!-- Modal -->
<div class="modal fade" id="kategoriprodukmodal" tabindex="-1" role="dialog" aria-labelledby="kategoriProdukLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriProdukLabel">Form Input Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/hrd/submit-penilaian" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="form-group col-6">
                            <label>From Date <span style="color: red">*</span></label>
                            <input type="date" class="form-control" name="from_date" required>
                        </div>
                        <div class="form-group col-6">
                            <label>To Date <span style="color: red">*</span></label>
                            <input type="date" class="form-control" name="to_date" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama Karyawan <span style="color: red">*</span></label>
                        <select name="user_id" class="form-control" required>
                            @foreach ($user as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label><strong>Kedisplinan</strong></label><br>
                    <div class="form-group">
                        <label>Kehadiran <small>(Presensi menunjukkan kepatuhan karyawan pada peraturan perusahaan mengenai waktu kerja.)</small><span style="color: red">*</span></label>
                        <select name="kehadiran" class="form-control" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <label><strong>Prestasi Kerja</strong></label><br>
                    <div class="row">
                        <div class="col-6">
                            
                            <div class="form-group">
                                <label>Kualitas <small>(Kemampuan untuk menyelesaikan suatu pekerjaan berdasarkan ketelitian, kerapihan dan kesesuaian hasil kerja.)</small><span style="color: red">*</span></label>
                                <select name="quality" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">

                            <div class="form-group">
                                <label>Beban Kerja <small>(Kemampuan menyelesaikan pekerjaan telah ditentukan sesuai dengan tanggungjawab pekerjaannya.)</small><span style="color: red">*</span></label>
                                <select name="workload" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            
                            <div class="form-group">
                                <label>Kecepatan <small>(Kemampuan menyelesaikan pekerjaan sesuai dengan waktu yang telah ditetapkan dengan cepat dan efisien.)</small><span style="color: red">*</span></label>
                                <select name="speed" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">

                            <div class="form-group">
                                <label>Pencapaian <small>(Kemampuan melakukan pekerjaan dengan sebaik mungkin untuk melampaui standar keberhasilan kerjanya.)</small><span style="color: red">*</span></label>
                                <select name="achievement" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <label><strong>Kemampuan Kerja</strong></label><br>
                    <div class="row">
                        <div class="col-6">
                            
                            <div class="form-group">
                                <label>Perencanaan <small>(Kemampuan untuk menyusun prioritas perencanaan dan mengkoordinasi pekerjaan)</small><span style="color: red">*</span></label>
                                <select name="planning" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Fleksibilitas <small>(Kemampuan untuk menyesuaikan diri dan bekerja dengan efektif pada berbagai situasi dan permasalahan.)</small><span style="color: red">*</span></label>
                                <select name="flexibility" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Inovasi <small>(Kemampuan untuk memunculkan ide baru yang dapat dipergunakan untuk mempermudah pekerjaan.)</small><span style="color: red">*</span></label>
                                <select name="inovation" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Keahlian Kerja <small>(Memiliki pengetahuan yang mendalam tentang pekerjaan dan mengetahui bagaimana cara kerja.)</small><span style="color: red">*</span></label>
                                <select name="jobskill" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Potensi <small>(Memiliki kemauan dan kemampuan untuk mengelola dan mengembangkan diri.)</small><span style="color: red">*</span></label>
                                <select name="potency" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Berpikir Komprehensif <small>(Kemampuan untuk memahami secara menyeluruh terhadap pekerjaan.)</small><span style="color: red">*</span></label>
                                <select name="comprehensive_thingking" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    


                    <label><strong>Sikap Kerja</strong></label><br>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Kerjasama <small>(Kemampuan untuk membangun hubungan dengan orang lain untuk mencapai tujuan.)</small><span style="color: red">*</span></label>
                                <select name="cooperative" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tanggung Jawab <small>(Kesadaran diri untuk mematuhi dan melaksanakan kebijakan dan peraturan perusahaan.)</small><span style="color: red">*</span></label>
                                <select name="responsibility" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Sikap <small>(Sikap dan penampilan karyawan dihubungkan dengan Semangat kerja, Kerja keras dan Tanggung jawab.)</small><span style="color: red">*</span></label>
                                <select name="attitude" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Pelaksanaan <small>(Melakukan pekerjaan sesuai instruksi dari atasan.)</small><span style="color: red">*</span></label>
                                <select name="execution" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Moral dan Perilaku <small>(Kejujuran, Integritas, Profesional dan etika.)</small><span style="color: red">*</span></label>
                                <select name="moral_behavior" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                   
                   
                   
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
