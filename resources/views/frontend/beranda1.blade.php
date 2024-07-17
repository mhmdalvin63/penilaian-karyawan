@extends('feMain')
@section('titleFe', 'beranda')
<link rel="stylesheet" href="{{asset('../frontEnd/css/beranda.css')}}"> 
<link rel="stylesheet" href="{{asset('../frontEnd/css/global.css')}}"> 
    
@section('contentFe')
    
    @include('frontend.navbar')

    

    
    
    @if ($penilaian && $penilaian->nilai_akhir > 0.1)
    <a href="#nilai" class="lihat-nilai text-center">
        <p>Lihat Nilai Saya</p>
        <h3>
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="white" d="m208.49 152.49l-72 72a12 12 0 0 1-17 0l-72-72a12 12 0 0 1 17-17L116 187V40a12 12 0 0 1 24 0v147l51.51-51.52a12 12 0 0 1 17 17Z"/></svg>
        </h3>
    </a>
        <div id="beranda" class="bg-blue">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-6 text-white">
                        <h1 class="fw-bold">HI, {{ Auth::user()->name }}!</h1>
                        <h4 class="my-2">Ini adalah halamanmu sekarang</h4>
                    </div>
                    <div class="col-4 d-flex justify-content-center">
                        <img class="kalender" src="{{ asset('../frontEnd/images/logo-pt.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div id="nilai" class="bg-blue2 py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 my-2">
                        <div class="border-tabel">
                            <div class="d-flex align-items-center gap-3">
                                <p class="fw-bold">Nama :</p>
                                <p>{{ Auth::user()->name }}</p>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <p class="fw-bold">Departement :</p>
                                <p>{{ Auth::user()->departemen->departemen }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-7 my-2">
                        <div class="border-tabel">
                            <div class="d-flex align-items-center justify-content-between gap-3">
                                <p class="fw-bold">Skor : 
                                    @if ($penilaian != null)
                                        {{ $penilaian->nilai_akhir }}
                                    @else
                                        belum ada nilai
                                    @endif
                                </p>
                                @if ($penilaian->nilai_akhir > 4.1)
                                    <span class="btn btn-success">Sempurna</span>
                                @elseif ($penilaian->nilai_akhir > 3.1)
                                    <span class="btn btn-primary">Baik</span>
                                @elseif ($penilaian->nilai_akhir > 2.1)
                                    <span class="btn btn-warning">Kurang</span>
                                @else
                                    <span class="btn btn-danger">Buruk</span>
                                @endif
                            </div>
                            <hr>
                            <div class="d-flex align-items-center gap-3 my-3">
                                <p class="fw-bold">Kehadiran :</p>
                                <p>{{ $penilaian->kehadiran }}</p>
                            </div>
                            <p class="desc-penilaian">Presensi menunjukkan kepatuhan karyawan pada peraturan perusahaan mengenai waktu kerja.                            </p>
                            <div class="d-flex align-items-center gap-3 my-3">
                                <p class="fw-bold">Quality :</p>
                                <p>{{ $penilaian->quality }}</p>
                            </div>
                            <p class="desc-penilaian">Kemampuan untuk menyelesaikan suatu pekerjaan berdasarkan ketelitian, kerapihan dan kesesuaian hasil kerja.</p>
                            <div class="d-flex align-items-center gap-3 my-3">
                                <p class="fw-bold">Speed :</p>
                                <p>{{ $penilaian->speed }}</p>
                            </div>
                             <p class="desc-penilaian">Kemampuan menyelesaikan pekerjaan sesuai dengan waktu yang telah ditetapkan dengan cepat dan efisien.
                             </p>
                            <div class="d-flex align-items-center gap-3 my-3">
                                <p class="fw-bold">Achievment :</p>
                                <p>{{ $penilaian->achievment }}</p>
                            </div>
                             <p class="desc-penilaian">Kemampuan melakukan pekerjaan dengan sebaik mungkin untuk melampaui standar keberhasilan kerjanya.</p>
                            <div class="d-flex align-items-center gap-3 my-3">
                                <p class="fw-bold">Planning :</p>
                                <p>{{ $penilaian->planning }}</p>
                            </div>
                             <p class="desc-penilaian">Kemampuan untuk menyusun prioritas perencanaan dan mengkoordinasi pekerjaan</p>
                            <div class="d-flex align-items-center gap-3 my-3">
                                <p class="fw-bold">Flexibility :</p>
                                <p>{{ $penilaian->flexibility }}</p>
                            </div>
                             <p class="desc-penilaian">Kemampuan untuk menyesuaikan diri dan bekerja dengan efektif pada berbagai situasi dan permasalahan.</p>
                            <div class="d-flex align-items-center gap-3 my-3">
                                <p class="fw-bold">Inovation :</p>
                                <p>{{ $penilaian->inovasion }}</p>
                            </div>
                             <p class="desc-penilaian">Kemampuan untuk memunculkan ide baru yang dapat dipergunakan untuk mempermudah pekerjaan.</p>
                            <div class="d-flex align-items-center gap-3 my-3">
                                <p class="fw-bold">Jobskill :</p>
                                <p>{{ $penilaian->jobskill }}</p>
                            </div>
                             <p class="desc-penilaian">Memiliki pengetahuan yang mendalam tentang pekerjaan dan mengetahui bagaimana cara kerja.</p>
                            <div class="d-flex align-items-center gap-3 my-3">
                                <p class="fw-bold">Coopertative :</p>
                                <p>{{ $penilaian->coopertative }}</p>
                            </div>
                             <p class="desc-penilaian">Kemampuan untuk membangun hubungan dengan orang lain untuk mencapai tujuan.</p>
                            <div class="d-flex align-items-center gap-3 my-3">
                                <p class="fw-bold">Responsibility :</p>
                                <p>{{ $penilaian->responsibility }}</p>
                            </div>
                             <p class="desc-penilaian">Kesadaran diri untuk mematuhi dan melaksanakan kebijakan dan peraturan perusahaan.</p>
                            <div class="d-flex align-items-center gap-3 my-3">
                                <p class="fw-bold">Atitude :</p>
                                <p>{{ $penilaian->atitude }}</p>
                            </div>
                             <p class="desc-penilaian">Sikap dan penampilan karyawan dihubungkan dengan Semangat kerja, Kerja keras dan Tanggung jawab.</p>
                            <div class="d-flex align-items-center gap-3 my-3">
                                <p class="fw-bold">Execution :</p>
                                <p>{{ $penilaian->execution }}</p>
                            </div>
                             <p class="desc-penilaian">Melakukan pekerjaan sesuai instruksi dari atasan.
                             </p>
                            <div class="d-flex align-items-center gap-3 my-3">
                                <p class="fw-bold">Moral Behavior :</p>
                                <p>{{ $penilaian->moral_behavior }}</p>
                            </div>
                             <p class="desc-penilaian">Kejujuran, Integritas, Profesional dan etika.
                             </p>
                            <div class="d-flex align-items-center gap-3 my-3">
                                <p class="fw-bold">Workload :</p>
                                <p>{{ $penilaian->workload }}</p>
                            </div>
                             <p class="desc-penilaian">Kemampuan menyelesaikan pekerjaan telah ditentukan sesuai dengan tanggungjawab pekerjaannya.</p>
                            <div class="d-flex align-items-center gap-3 my-3">
                                <p class="fw-bold">Potency :</p>
                                <p>{{ $penilaian->potency }}</p>
                            </div>
                             <p class="desc-penilaian">Memiliki kemauan dan kemampuan untuk mengelola dan mengembangkan diri.
                             </p>
                            <div class="d-flex align-items-center gap-3 my-3">
                                <p class="fw-bold">Comprehensive thingking :</p>
                                <p>{{ $penilaian->comprehensive_thingking }}</p>
                            </div>
                             <p class="desc-penilaian">Kemampuan untuk memahami secara menyeluruh terhadap pekerjaan.</p>
                        </div>
                    </div>
                    <div class="col-5 text-center">
                        <img src="{{ asset('../frontEnd/images/jempol.png') }}" alt="">
                        <p>Tingkatkan terus dirimu ya !</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div id="beranda" class="bg-blue">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-6 text-white">
                        <h1 class="fw-bold">HI, {{ Auth::user()->name }}!</h1>
                        <h4 class="my-2">Tampaknya kamu belum memiliki nilai</h4>
                    </div>
                    <div class="col-4 d-flex justify-content-center">
                        <img class="kalender" src="{{ asset('../frontEnd/images/logo-pt.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    @endif



@endsection