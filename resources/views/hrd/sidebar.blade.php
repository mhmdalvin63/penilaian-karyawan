<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="#">Dashboard</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        {{-- <a href="#">W</a> --}}
        <img src="/assets/img/LogoWin-Shop.png" style="width: 40px; height: 40px;" alt="">
      </div>
      <ul class="sidebar-menu">
        @if (Auth::user()->role == 'hrd')
            
        <li><a href="/hrd/jabatan"><i class="fas fa-th-large"></i><span>Jabatan</span></a></li>
        <li><a href="/hrd/departemen"><i class="fas fa-th-large"></i><span>Departemen / Divisi</span></a></li>
        <li><a href="/hrd/kabag"><i class="fas fa-user"></i><span>Kepala Bagian</span></a></li>
        @endif
          <li><a href="/hrd/karyawan"><i class="fas fa-user"></i><span>Karyawan</span></a></li>
          <li><a href="/hrd/penilaian-karyawan"><i class="fas fa-star"></i><span>Penilaian Karyawan</span></a></li>
          <li><a href="/hrd/laporan"><i class="fas fa-file"></i><span>Laporan Penilaian</span></a></li>
      </ul>
      
    </aside>
  </div>