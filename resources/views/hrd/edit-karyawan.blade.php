@extends('hrd.layout')
@section('content')
<div class="section-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Karyawan</h4>
            </div>
            <form action="/hrd/update-karyawan/{{$data->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Jabatan <span style="color: red">*</span></label>
                        <select name="jabatan_id" class="form-control" required>
                            @foreach ($jabatan as $item)
                            <option value="{{$item->id}}" {{$data->jabatan_id == $item->id ? 'selected' : ''}}>{{$item->jabatan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Departemen <span style="color: red">*</span></label>
                        <select name="departemen_id"  class="form-control" required>
                            @foreach ($departemen as $item)
                            <option value="{{$item->id}}" {{$data->departemen_id == $item->id ? 'selected' : ''}}>{{$item->departemen}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nik</label>
                        <input type="text" class="form-control" required value="{{ $data->nik }}" name="nik">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" required value="{{ $data->name }}" name="name">
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="text" class="form-control" required value="{{ $data->email }}" name="email">
                    </div>
                    <div class="form-group">
                        <label>password</label>
                        <input type="text" class="form-control" required value="{{ $data->password }}" name="password">
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
