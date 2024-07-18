@extends('feMain')
@section('titleFe', 'login')
<link rel="stylesheet" href="{{asset('../frontEnd/css/login.css')}}"> 
<link rel="stylesheet" href="{{asset('../frontEnd/css/global.css')}}"> 
    
@section('contentFe')
    
    <div id="login" class="bg-blue">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-7">
                    <div class="btn-login bg-blue2 my-5 mx-auto">
                        <h2 class="fw-bolder lt-5">LOGIN</h2>
                    </div>
                    @if (session('success'))
                        
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session('error'))
                        
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label lt-5 text-white ps-3">Email</label>
                          <input type="email" name="email" class="form-control form-log-reg" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 password-container">
                            <label for="exampleInputPassword1" class="form-label ps-3 text-white">Password</label>
                            <input type="password" required class="form-control form-log-reg" name="password" id="exampleInputPassword1">
                            <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                        </div>  
                        <button class="btn-log-reg bg-green fw-bold lt-5 my-4" role="button">LOGIN</button>
                    </form>

                        <div class="for-regist d-flex align-items-center justify-content-center gap-2 ">
                            <p class="text-white">Belum mempunyai akun?</p>
                            <a href="/register" class="text-yellow text-decoration-none">Register</a>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('exampleInputPassword1');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>

@endsection