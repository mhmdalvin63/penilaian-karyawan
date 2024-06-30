@extends('feMain')
@section('titleFe', 'beranda')
<link rel="stylesheet" href="{{asset('../frontEnd/css/departement.css')}}"> 
<link rel="stylesheet" href="{{asset('../frontEnd/css/global.css')}}"> 
    
@section('contentFe')
    
    @include('frontend.navbar')

    <div id="departement" class="bg-blue">
        <div class="container">
            <h4 class="text-white text-center my-3">Departement LOREM IPSUM</h4>
            <div class="border-tabel"">
                <div class="d-flex justify-content-between align-items-center mx-5 mb-5 mt-3">
                    <p>List Data Nilai Karyawan</p>
                    <a class="btn-import bg-yellow d-flex align-items-center gap-2" href="#" role="button">
                        <h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="black" d="M12 2v6.5a1.5 1.5 0 0 0 1.5 1.5H20v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-1h3.414l-1.121 1.121a1 1 0 1 0 1.414 1.415l2.829-2.829a1 1 0 0 0 0-1.414l-2.829-2.828a1 1 0 1 0-1.414 1.414L7.414 17H4V4a2 2 0 0 1 2-2zM4 17v2H3a1 1 0 1 1 0-2zM14 2.043a2 2 0 0 1 1 .543L19.414 7a2 2 0 0 1 .543 1H14z"/></g></svg>
                        </h3>
                        <p class="fw-bold">Import Excel</p>
                    </a>
                </div>
                <table class="table">
                    <thead>
                      <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Lorem</th>
                        <th scope="col">Lorem</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

@endsection