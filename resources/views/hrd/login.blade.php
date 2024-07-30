<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login HRD</title>
    <link rel="stylesheet" href="{{asset('../frontEnd/css/global.css')}}"> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        .container{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .kalender{
            width: 75%;
            height: auto;
            object-fit: contain;
        }
        .card{
            background: none !important;
            border: none !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card w-50">
            <img class="kalender mx-auto" src="{{asset('../frontEnd/images/logo-text-pt.png')}}" alt=""> 
            <h5 class="text-center my-3">Sistem Informasi Penilaian Kerja Karyawan</h5>
            <div class="card-body">
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <form action="/hrd/submit-login" method="POST">
                    @csrf 
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label ps-3">Email</label>
                        <input type="email" required class="form-control form-log-reg" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 password-container">
                        <label for="exampleInputPassword1" class="form-label ps-3">Password</label>
                        <input type="password" required class="form-control form-log-reg" name="password" id="exampleInputPassword1">
                        <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                    </div>  
                    <button type="submit" class="btn-log-reg bg-blue2 fw-bold">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('exampleInputPassword1');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>
