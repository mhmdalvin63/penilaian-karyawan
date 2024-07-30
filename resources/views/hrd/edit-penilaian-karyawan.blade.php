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
                    <form action="/hrd/update-penilaian/{{$data->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="row">
        
                                <div class="form-group col-6">
                                    <label>From Date <span style="color: red">*</span></label>
                                    <input type="date" class="form-control" value="{{$data->from_date}}" name="from_date" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>To Date <span style="color: red">*</span></label>
                                    <input type="date" class="form-control" value="{{$data->to_date}}" name="to_date" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Karyawan <span style="color: red">*</span></label>
                                <select name="user_id" class="form-control" required>
                                    @foreach ($user as $item)
                                    <option value="{{$item->id}}" {{$data->user_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <label><strong>Kedisplinan</strong></label><br>
                            <div class="form-group">
                            <label>Kehadiran <small>(Presensi menunjukkan kepatuhan karyawan pada peraturan perusahaan mengenai waktu kerja.)</small><span style="color: red">*</span></label>
                                <select name="kehadiran" class="form-control" required>
                                    <option value="1" {{$data->kehadiran == 1 ? 'selected' : ''}}>1</option>
                                    <option value="2" {{$data->kehadiran == 2 ? 'selected' : ''}}>2</option>
                                    <option value="3" {{$data->kehadiran == 3 ? 'selected' : ''}}>3</option>
                                    <option value="4" {{$data->kehadiran == 4 ? 'selected' : ''}}>4</option>
                                    <option value="5" {{$data->kehadiran == 5 ? 'selected' : ''}}>5</option>
                                </select>
                            </div>
        
                            <label><strong>Prestasi Kerja</strong></label><br>
                            <div class="row">
                                <div class="col-6">
                                    
                                    <div class="form-group">
                                    <label>Kualitas <small>(Kemampuan untuk menyelesaikan suatu pekerjaan berdasarkan ketelitian, kerapihan dan kesesuaian hasil kerja.)</small><span style="color: red">*</span></label>
                                        <select name="quality" class="form-control" required>
                                            <option value="1" {{$data->quality == 1 ? 'selected' : ''}}>1</option>
                                    <option value="2" {{$data->quality == 2 ? 'selected' : ''}}>2</option>
                                    <option value="3" {{$data->quality == 3 ? 'selected' : ''}}>3</option>
                                    <option value="4" {{$data->quality == 4 ? 'selected' : ''}}>4</option>
                                    <option value="5" {{$data->quality == 5 ? 'selected' : ''}}>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
        
                                    <div class="form-group">
                                    <label>Beban Kerja <small>(Kemampuan menyelesaikan pekerjaan telah ditentukan sesuai dengan tanggungjawab pekerjaannya.)</small><span style="color: red">*</span></label>
                                        <select name="workload" class="form-control" required>
                                            <option value="1" {{$data->workload == 1 ? 'selected' : ''}}>1</option>
                                            <option value="2" {{$data->workload == 2 ? 'selected' : ''}}>2</option>
                                            <option value="3" {{$data->workload == 3 ? 'selected' : ''}}>3</option>
                                            <option value="4" {{$data->workload == 4 ? 'selected' : ''}}>4</option>
                                            <option value="5" {{$data->workload == 5 ? 'selected' : ''}}>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    
                                    <div class="form-group">
                                    <label>Kecepatan <small>(Kemampuan menyelesaikan pekerjaan sesuai dengan waktu yang telah ditetapkan dengan cepat dan efisien.)</small><span style="color: red">*</span></label>
                                        <select name="speed" class="form-control" required>
                                            <option value="1" {{$data->speed == 1 ? 'selected' : ''}}>1</option>
                                            <option value="2" {{$data->speed == 2 ? 'selected' : ''}}>2</option>
                                            <option value="3" {{$data->speed == 3 ? 'selected' : ''}}>3</option>
                                            <option value="4" {{$data->speed == 4 ? 'selected' : ''}}>4</option>
                                            <option value="5" {{$data->speed == 5 ? 'selected' : ''}}>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
        
                                    <div class="form-group">
                                    <label>Pencapaian <small>(Kemampuan melakukan pekerjaan dengan sebaik mungkin untuk melampaui standar keberhasilan kerjanya.)</small><span style="color: red">*</span></label>
                                        <select name="achievement" class="form-control" required>
                                            <option value="1" {{$data->achievement == 1 ? 'selected' : ''}}>1</option>
                                            <option value="2" {{$data->achievement == 2 ? 'selected' : ''}}>2</option>
                                            <option value="3" {{$data->achievement == 3 ? 'selected' : ''}}>3</option>
                                            <option value="4" {{$data->achievement == 4 ? 'selected' : ''}}>4</option>
                                            <option value="5" {{$data->achievement == 5 ? 'selected' : ''}}>5</option>
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
                                            <option value="1" {{$data->planning == 1 ? 'selected' : ''}}>1</option>
                                            <option value="2" {{$data->planning == 2 ? 'selected' : ''}}>2</option>
                                            <option value="3" {{$data->planning == 3 ? 'selected' : ''}}>3</option>
                                            <option value="4" {{$data->planning == 4 ? 'selected' : ''}}>4</option>
                                            <option value="5" {{$data->planning == 5 ? 'selected' : ''}}>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                    <label>Fleksibilitas <small>(Kemampuan untuk menyesuaikan diri dan bekerja dengan efektif pada berbagai situasi dan permasalahan.)</small><span style="color: red">*</span></label>
                                        <select name="flexibility" class="form-control" required>
                                            <option value="1" {{$data->flexibility == 1 ? 'selected' : ''}}>1</option>
                                            <option value="2" {{$data->flexibility == 2 ? 'selected' : ''}}>2</option>
                                            <option value="3" {{$data->flexibility == 3 ? 'selected' : ''}}>3</option>
                                            <option value="4" {{$data->flexibility == 4 ? 'selected' : ''}}>4</option>
                                            <option value="5" {{$data->flexibility == 5 ? 'selected' : ''}}>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                    <label>Inovasi <small>(Kemampuan untuk memunculkan ide baru yang dapat dipergunakan untuk mempermudah pekerjaan.)</small><span style="color: red">*</span></label>
                                        <select name="inovation" class="form-control" required>
                                            <option value="1" {{$data->inovasion == 1 ? 'selected' : ''}}>1</option>
                                            <option value="2" {{$data->inovasion == 2 ? 'selected' : ''}}>2</option>
                                            <option value="3" {{$data->inovasion == 3 ? 'selected' : ''}}>3</option>
                                            <option value="4" {{$data->inovasion == 4 ? 'selected' : ''}}>4</option>
                                            <option value="5" {{$data->inovasion == 5 ? 'selected' : ''}}>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                    <label>Keahlian Kerja <small>(Memiliki pengetahuan yang mendalam tentang pekerjaan dan mengetahui bagaimana cara kerja.)</small><span style="color: red">*</span></label>
                                        <select name="jobskill" class="form-control" required>
                                            <option value="1" {{$data->jobskill == 1 ? 'selected' : ''}}>1</option>
                                    <option value="2" {{$data->jobskill == 2 ? 'selected' : ''}}>2</option>
                                    <option value="3" {{$data->jobskill == 3 ? 'selected' : ''}}>3</option>
                                    <option value="4" {{$data->jobskill == 4 ? 'selected' : ''}}>4</option>
                                    <option value="5" {{$data->jobskill == 5 ? 'selected' : ''}}>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                    <label>Potensi <small>(Memiliki kemauan dan kemampuan untuk mengelola dan mengembangkan diri.)</small><span style="color: red">*</span></label>
                                        <select name="potency" class="form-control" required>
                                            <option value="1" {{$data->potency == 1 ? 'selected' : ''}}>1</option>
                                            <option value="2" {{$data->potency == 2 ? 'selected' : ''}}>2</option>
                                            <option value="3" {{$data->potency == 3 ? 'selected' : ''}}>3</option>
                                            <option value="4" {{$data->potency == 4 ? 'selected' : ''}}>4</option>
                                            <option value="5" {{$data->potency == 5 ? 'selected' : ''}}>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                    <label>Berpikir Komprehensif <small>(Kemampuan untuk memahami secara menyeluruh terhadap pekerjaan.)</small><span style="color: red">*</span></label>
                                        <select name="comprehensive_thingking" class="form-control" required>
                                            <  <option value="1" {{$data->comprehensive_thingking == 1 ? 'selected' : ''}}>1</option>
                                            <option value="2" {{$data->comprehensive_thingking == 2 ? 'selected' : ''}}>2</option>
                                            <option value="3" {{$data->comprehensive_thingking == 3 ? 'selected' : ''}}>3</option>
                                            <option value="4" {{$data->comprehensive_thingking == 4 ? 'selected' : ''}}>4</option>
                                            <option value="5" {{$data->comprehensive_thingking == 5 ? 'selected' : ''}}>5</option>
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
                                            <option value="1" {{$data->coopertative == 1 ? 'selected' : ''}}>1</option>
                                    <option value="2" {{$data->coopertative == 2 ? 'selected' : ''}}>2</option>
                                    <option value="3" {{$data->coopertative == 3 ? 'selected' : ''}}>3</option>
                                    <option value="4" {{$data->coopertative == 4 ? 'selected' : ''}}>4</option>
                                    <option value="5" {{$data->coopertative == 5 ? 'selected' : ''}}>5</option>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="col-6">
                                    <div class="form-group">
                                    <label>Tanggung Jawab <small>(Kesadaran diri untuk mematuhi dan melaksanakan kebijakan dan peraturan perusahaan.)</small><span style="color: red">*</span></label>
                                        <select name="responsibility" class="form-control" required>
                                            <option value="1" {{$data->responsibility == 1 ? 'selected' : ''}}>1</option>
                                    <option value="2" {{$data->responsibility == 2 ? 'selected' : ''}}>2</option>
                                    <option value="3" {{$data->responsibility == 3 ? 'selected' : ''}}>3</option>
                                    <option value="4" {{$data->responsibility == 4 ? 'selected' : ''}}>4</option>
                                    <option value="5" {{$data->responsibility == 5 ? 'selected' : ''}}>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                    <label>Sikap <small>(Sikap dan penampilan karyawan dihubungkan dengan Semangat kerja, Kerja keras dan Tanggung jawab.)</small><span style="color: red">*</span></label>
                                        <select name="attitude" class="form-control" required>
                                            <option value="1" {{$data->attitude == 1 ? 'selected' : ''}}>1</option>
                                    <option value="2" {{$data->attitude == 2 ? 'selected' : ''}}>2</option>
                                    <option value="3" {{$data->attitude == 3 ? 'selected' : ''}}>3</option>
                                    <option value="4" {{$data->attitude == 4 ? 'selected' : ''}}>4</option>
                                    <option value="5" {{$data->attitude == 5 ? 'selected' : ''}}>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                    <label>Pelaksanaan <small>(Melakukan pekerjaan sesuai instruksi dari atasan.)</small><span style="color: red">*</span></label>
                                        <select name="execution" class="form-control" required>
                                            <option value="1" {{$data->execution == 1 ? 'selected' : ''}}>1</option>
                                            <option value="2" {{$data->execution == 2 ? 'selected' : ''}}>2</option>
                                            <option value="3" {{$data->execution == 3 ? 'selected' : ''}}>3</option>
                                            <option value="4" {{$data->execution == 4 ? 'selected' : ''}}>4</option>
                                            <option value="5" {{$data->execution == 5 ? 'selected' : ''}}>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
        
                                    <div class="form-group">
                                    <label>Moral dan Perilaku <small>(Kejujuran, Integritas, Profesional dan etika.)</small><span style="color: red">*</span></label>
                                        <select name="moral_behavior" class="form-control" required>
                                            <option value="1" {{$data->moral_behavior == 1 ? 'selected' : ''}}>1</option>
                                            <option value="2" {{$data->moral_behavior == 2 ? 'selected' : ''}}>2</option>
                                            <option value="3" {{$data->moral_behavior == 3 ? 'selected' : ''}}>3</option>
                                            <option value="4" {{$data->moral_behavior == 4 ? 'selected' : ''}}>4</option>
                                            <option value="5" {{$data->moral_behavior == 5 ? 'selected' : ''}}>5</option>
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
    </div>
</div>
@endsection
