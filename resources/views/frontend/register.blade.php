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
                        <h2 class="fw-bolder lt-5">REGISTER</h2>
                    </div>
                    <form>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label lt-5 text-white ps-3">Username</label>
                          <input type="email" class="form-control form-log-reg" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label lt-5 text-white ps-3">Password</label>
                          <input type="password" class="form-control form-log-reg" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label lt-5 text-white ps-3">Departement</label>
                          <input type="password" class="form-control form-log-reg" id="exampleInputPassword1">
                        </div>
                    </form>
                        <a class="btn-log-reg bg-green fw-bold lt-5 my-4" href="#" role="button">REGISTER</a>

                        <div class="for-regist d-flex align-items-center justify-content-center gap-2 ">
                            <p class="text-white">Sudah mempunyai akun?</p>
                            <a href="" class="text-yellow text-decoration-none">Login</a>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection