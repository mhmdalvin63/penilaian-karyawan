@extends('feMain')
@section('titleFe', 'beranda')
<link rel="stylesheet" href="{{asset('../frontEnd/css/beranda.css')}}"> 
<link rel="stylesheet" href="{{asset('../frontEnd/css/global.css')}}"> 
    
@section('contentFe')
    
    @include('frontend.navbar')

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
                    <h1 class="fw-bold">HI, {{Auth::user()->name}}!</h1>
                    <h4 class="my-2">Ini adalah halamanmu sekarang</h4>
                </div>
                <div class="col-4 d-flex justify-content-start">
                    <img class="kalender" src="{{asset('../frontEnd/images/kalender.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>

    <div id="nilai" class="bg-blue2 py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 my-2">
                    <div class="border-tabel"">
                        <div class="d-flex align-items-center gap-3">
                            <p class="fw-bold">Nama :</p>
                            <p>{{Auth::user()->name}}</p>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <p class="fw-bold">Departement :</p>
                            <p>{{Auth::user()->departemen->departemen}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-7 my-2">
                    <div class="border-tabel"">
                        <div class="d-flex align-items-center gap-3">
                            <p class="fw-bold">Skor : 
                                @if ($penilaian != null)
                                    {{$penilaian->nilai_akhir}}
                                @else
                                belum ada nilai
                                @endif
                            </p>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center gap-3 my-2">
                            <p class="fw-bold">Departement :</p>
                            <p>Lorem ipsum dolor sit.</p>
                        </div>
                        <div class="d-flex align-items-center gap-3 my-2">
                            <p class="fw-bold">Departement :</p>
                            <p>Lorem ipsum dolor sit.</p>
                        </div>
                        <div class="d-flex align-items-center gap-3 my-2">
                            <p class="fw-bold">Departement :</p>
                            <p>Lorem ipsum dolor sit.</p>
                        </div>
                        <div class="d-flex align-items-center gap-3 my-2">
                            <p class="fw-bold">Departement :</p>
                            <p>Lorem ipsum dolor sit.</p>
                        </div>
                        <div class="d-flex align-items-center gap-3 my-2">
                            <p class="fw-bold">Departement :</p>
                            <p>Lorem ipsum dolor sit.</p>
                        </div>
                        <div class="d-flex align-items-center gap-3 my-2">
                            <p class="fw-bold">Departement :</p>
                            <p>Lorem ipsum dolor sit.</p>
                        </div>
                        <div class="d-flex align-items-center gap-3 my-2">
                            <p class="fw-bold">Departement :</p>
                            <p>Lorem ipsum dolor sit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-5 text-center">
                    <img src="{{asset('../frontEnd/images/jempol.png')}}" alt="">
                    <p>Tingkatkan terus dirimu ya !</p>
                </div>
            </div>
        </div>
    </div>

@endsection