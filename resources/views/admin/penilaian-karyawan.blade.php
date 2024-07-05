@extends('admin.layout')
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
                                    @foreach ($data as $item)
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
                                            <form action="/admin/delete-penilaian/{{$item->id}}" method="POST" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini?');">
                                                @csrf
                                                @method('delete')
                                                <span><a class="btn btn-primary" href="/admin/edit-penilaian/{{$item->id}}"><i class="far fa-edit"></i>Edit</a></span>
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
            <form action="/admin/submit-penilaian" method="post" enctype="multipart/form-data">
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
                        <label>Kehadiran <span style="color: red">*</span></label>
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
                                <label>Quality(Kualitas) <span style="color: red">*</span></label>
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
                                <label>Workload(Beban Kerja) <span style="color: red">*</span></label>
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
                                <label>Speed(Kecepatan) <span style="color: red">*</span></label>
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
                                <label>Achievement(Pencapaian) <span style="color: red">*</span></label>
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
                                <label>Planning(Perencanaan) <span style="color: red">*</span></label>
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
                                <label>Flexibility(Fleksibilitas) <span style="color: red">*</span></label>
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
                                <label>Innovation(Inovasi) <span style="color: red">*</span></label>
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
                                <label>Job Skill(Keahlian Kerja) <span style="color: red">*</span></label>
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
                                <label>Potency(Potensi) <span style="color: red">*</span></label>
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
                                <label>Comprehensive Thingking(Berpikir Komprehensif) <span style="color: red">*</span></label>
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
                                <label>Cooperative(Kerjasama) <span style="color: red">*</span></label>
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
                                <label>Responsibility(Tanggung Jawab) <span style="color: red">*</span></label>
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
                                <label>Attitude(Sikap) <span style="color: red">*</span></label>
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
                                <label>Execution(Pelaksanaan) <span style="color: red">*</span></label>
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
                                <label>Moral & Behavior(Moral dan Perilaku) <span style="color: red">*</span></label>
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
