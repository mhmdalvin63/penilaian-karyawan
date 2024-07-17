<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Penilaian Karyawan</title>
  <!-- General CSS Files -->
   <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">

  <style>
  </style>

<!-- /END GA --></head>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg" style=" background-color: #63ed7a !important;"></div>
     @include('hrd.navbar')
      
      @include('hrd.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @yield('content')
        </section>
          @yield('modal')
      </div>
     @include('hrd.footer')
    </div>
  </div>
  
  
  <!-- General JS Scripts -->
   <script src="{{ asset('assets/modules/jquery.min.js')}}"></script>
   <script src="{{ asset('assets/modules/popper.js')}}"></script>
   <script src="{{ asset('assets/modules/tooltip.js')}}"></script>
   <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
   <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
   <script src="{{ asset('assets/modules/moment.min.js')}}"></script>
   <script src="{{ asset('assets/js/stisla.js')}}"></script>
   
   
   <!-- JS Libraies -->
   <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
   <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
  <script src="{{ asset('assets/modules/datatables/datatables.min.js')}}"></script>
   <script src="{{ asset('assets/modules/summernote/summernote-bs4.js')}}"></script>
   <script src="{{ asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
   <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>

 
   <!-- Page Specific JS File -->
   <script src="{{ asset('assets/js/page/forms-advanced-forms.js')}}"></script>
   <script src="{{ asset('assets/js/page/features-post-create.js')}}"></script> 
   <script src="{{ asset('assets/js/page/modules-toastr.js')}}"></script>
   
   <!-- Template JS File -->
   <script src="{{ asset('assets/js/scripts.js')}}"></script>
   <script src="{{ asset('assets/js/custom.js')}}"></script>
  
</body>
</html>