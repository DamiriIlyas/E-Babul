@extends('layout.app')

@section('title','Tambah Sekolah')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Pendaftaran</h6>
    </div>
    <div class="card-body">
        <form action="{{url('update_sekolah/'. $sekolah->id)}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Nama Sekolah</label>
              <input type="text" name="nama_sekolah" value="{{$sekolah->nama_sekolah}}" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
    </div>
</div>

@endsection