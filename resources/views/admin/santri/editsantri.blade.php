@extends('layout.app')

@section('title','Edit Santri')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Peserta</h6>
    </div>
    <div class="card-body">
        <form action="{{url('update_santri/'. $santri->id)}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Nama santri</label>
              <input type="text" name="nama_santri" value="{{$santri->nama_santri}}" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">NISN</label>
              <input type="number" name="nisn" value="{{$santri->nisn}}" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">NIK</label>
              <input type="number" name="nik" value="{{$santri->nik}}" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">jenis_kelamin</label>
              <input type="text" name="jenis_kelamin" value="{{$santri->jenis_kelamin}}" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">tempat_lahir</label>
              <input type="text" name="tempat_lahir" value="{{$santri->tempat_lahir}}" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">tanggal_lahir</label>
              <input type="number" name="tanggal_lahir" value="{{$santri->tanggal_lahir}}" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">alamat_lengkap</label>
              <input type="text" name="alamat_lengkap" value="{{$santri->alamat_lengkap}}" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">asal_sekolah</label>
              <input type="text" name="asal_sekolah" value="{{$santri->asal_sekolah}}" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">tahun_lulus</label>
              <input type="number" name="tahun_lulus" value="{{$santri->tahun_lulus}}" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">nama_wali</label>
              <input type="text" name="nama_wali" value="{{$santri->nama_wali}}" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">nik_wali</label>
              <input type="number" name="nik_wali" value="{{$santri->nik_wali}}" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">alamat_wali</label>
              <input type="text" name="alamat_wali" value="{{$santri->alamat_wali}}" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">pekerjaan_wali</label>
              <input type="text" name="pekerjaan_wali" value="{{$santri->pekerjaan_wali}}" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">nomor_telepon</label>
              <input type="number" name="nomor_telepon" value="{{$santri->nomor_telepon}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>

          </form>
    </div>
</div>

@endsection