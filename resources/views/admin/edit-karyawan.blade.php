@extends('admin.layout')
@section('content')
<div class="section-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Karyawan</h4>
            </div>
            <form action="/admin/update-karyawan/{{$data->id}}" method="post" enctype="multipart/form-data">
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
                        <label>Jabatan <span style="color: red">*</span></label>
                        <select name="potency" class="form-control" required>
                            @foreach ($jabatan as $item)
                            <option value="{{$item->id}}" {{$data->jabatan_id == $item->id ? 'selected' : ''}}>{{$item->jabatan}}</option>
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
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
