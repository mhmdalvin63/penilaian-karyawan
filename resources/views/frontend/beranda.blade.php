@extends('feMain')
@section('titleFe', 'beranda')
<link rel="stylesheet" href="{{asset('../frontEnd/css/beranda.css')}}"> 
<link rel="stylesheet" href="{{asset('../frontEnd/css/global.css')}}"> 
    
@section('contentFe')

    
    
    <div id="beranda" class="bg-blue">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-6 text-white">
                    <h1 class="fw-bold">YUK LIHAT NILAI KAMU !</h1>
                    <div class="d-flex align-items-center gap-3">
                        <a class="btn-beranda btn-login bg-green" href="#" role="button">Login</a>
                        <a class="btn-beranda btn-register bg-yellow" href="#" role="button">Register</a>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-start">
                    <img class="kalender" src="{{asset('../frontEnd/images/kalender.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>

@endsection