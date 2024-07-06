@extends('feMain')
@section('titleFe', 'register')
<link rel="stylesheet" href="{{asset('../frontEnd/css/login.css')}}"> 
<link rel="stylesheet" href="{{asset('../frontEnd/css/global.css')}}"> 
    
@section('contentFe')
    
    <div id="login" class="bg-blue">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-7">
                    <div class="btn-login bg-blue2 my-5 mx-auto">
                        <h2 class="fw-bolder lt-5">REGISTERED</h2>
                    </div>
                    @if (session('error'))
                        
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label lt-5 text-white ps-3">Nik</label>
                          <input type="text" name="nik" class="form-control form-log-reg" required id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label lt-5 text-white ps-3">Username</label>
                          <input type="text" name="name" class="form-control form-log-reg" required id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label lt-5 text-white ps-3">Email</label>
                          <input type="email" name="email" class="form-control form-log-reg" required id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label lt-5 text-white ps-3">Password</label>
                          <input type="password" name="password" class="form-control form-log-reg" required id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label lt-5 text-white ps-3">Jabatan</label>
                          <select name="jabatan_id" id="" class="form-control form-log-reg" required>
                            @foreach ($jabatan as $item)
                                <option value="{{$item->id}}">{{$item->jabatan}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label lt-5 text-white ps-3">Departement</label>
                          <select name="departemen_id" id="" class="form-control form-log-reg" required>
                            @foreach ($data as $item)
                                <option value="{{$item->id}}">{{$item->departemen}}</option>
                            @endforeach
                          </select>
                        </div>
                        <button type="submit" class="btn-log-reg  bg-green fw-bold lt-5 my-4" role="button">REGISTER</button>
                    </form>

                        <div class="for-regist d-flex align-items-center justify-content-center gap-2 ">
                            <p class="text-white">Sudah mempunyai akun?</p>
                            <a href="/login" class="text-yellow text-decoration-none">Login</a>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection