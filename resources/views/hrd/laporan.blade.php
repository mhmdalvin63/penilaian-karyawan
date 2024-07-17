@extends('hrd.layout')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="w-100">List Laporan Penilaian</h4>
                    
                </div>
                <div class="card-body">
                    <form action="/hrd/export" method="post">
                        @csrf
                        <div class="menus" style="display: flex; justify-content: start; gap: 1rem; align-items: center">
                            <div class="form-group">
                                <label>From Date <span style="color: red">*</span></label>
                                <input type="date" class="form-control"  name="from_date" required>
                            </div>
                            <div class="form-group">
                                <label>To Date <span style="color: red">*</span></label>
                                <input type="date" class="form-control" name="to_date" required>
                            </div>
                                <button class="btn btn-dark" type="submit"><i class="fas fa-download"></i> Download Excel</button>
                        </div>
                    </form>
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{session('success')}}
                        </div>
                    </div>
                    @endif
                            <table class="table table-striped w-100" id="kategori">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nik</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Tahun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($data as $item)
                                        <tr>
                                            <th scope="row">{{$no++}}</th>
                                            <td>{{$item->user->nik}}</td>
                                            <td>{{$item->user->name}}</td>
                                            <td>{{$item->user->email}}</td>
                                            <td>{{$item->from_date}}</td>
                                            <td>{{$item->to_date}}</td>
                                            <td>{{$item->created_at->format('Y')}}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection