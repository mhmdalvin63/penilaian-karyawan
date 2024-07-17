@extends('hrd.layout')
@section('content')
<div class="section-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Jabatan</h4>
            </div>
            <form action="/hrd/update-jabatan/{{$data->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" required value="{{ $data->jabatan }}" name="jabatan">
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

