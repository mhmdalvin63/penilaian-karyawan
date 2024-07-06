@extends('admin.layout')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="w-100">List Karyawan</h4>
                    @if (Auth::user()->role == 'admin')
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#kategoriprodukmodal">
                            <span class="text">+ Tambah</span>
                        </button>
                    @endif
                    
                </div>
                <div class="card-body">
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
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{session('error')}}
                        </div>
                    </div>
                    @endif
                    <div class="table-responsive">

                            <table class="table table-striped w-100" id="kategori">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jabatan</th>
                                        <th>Departemen</th>
                                        <th>Nama</th>
                                        <th>Nik</th>
                                        <th>Email</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{$no++}}</th>
                                        @if ($item->jabatan != null)
                                            
                                        <td>{{$item->jabatan->jabatan}}</td>
                                        @else
                                        <td>-</td>
                                            
                                        @endif
                                        @if ($item->departemen != null)
                                            
                                        <td>{{$item->departemen->departemen}}</td>
                                        @else
                                        <td>-</td>
                                            
                                        @endif
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->nik}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>
                                            <form action="/admin/delete-karyawan/{{$item->id}}" method="POST" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini?');">
                                                @csrf
                                                @method('delete')
                                                <span><a class="btn btn-primary" href="/admin/edit-karyawan/{{$item->id}}"><i class="far fa-edit"></i>Edit</a></span>
                                                <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
<!-- Modal -->
<div class="modal fade" id="kategoriprodukmodal" tabindex="-1" role="dialog" aria-labelledby="kategoriProdukLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriProdukLabel">Form Input Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/submit-karyawan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Jabatan <span style="color: red">*</span></label>
                        <select name="jabatan_id" class="form-control" required>
                            @foreach ($jabatan as $item)
                                <option value="{{$item->id}}">{{$item->jabatan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Departemen <span style="color: red">*</span></label>
                        <select name="departemen_id" class="form-control" required>
                            @foreach ($departemen as $item)
                                <option value="{{$item->id}}">{{$item->departemen}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nik <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="nik" required>
                    </div>
                    <div class="form-group">
                        <label>Name <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Email <span style="color: red">*</span></label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Password <span style="color: red">*</span></label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
