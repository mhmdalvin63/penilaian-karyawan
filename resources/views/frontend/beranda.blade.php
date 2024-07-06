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
                        @if (Auth::user() == null)
                            
                        <a class="btn-beranda btn-login bg-green" href="/login" role="button">Login</a>
                        <a class="btn-beranda btn-register bg-yellow" href="/register" role="button">Register</a>
                        @else
                        <a class="btn-beranda btn-login bg-green" href="/beranda" role="button">Lihat</a>
                        @endif
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <img class="kalender" src="{{asset('../frontEnd/images/logo-pt.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
@if (session('success'))
    <script>
        alert('{{session('success')}}')
    </script>
@endif
@endsection