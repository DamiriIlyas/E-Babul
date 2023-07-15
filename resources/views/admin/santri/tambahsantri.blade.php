@extends('layout.app')

@section('title','Tambah Santri')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Pendaftaran</h6>
    </div>
    <div class="card-body">
        <form action="/post_santri" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Nama Lengkap</label>
              <input type="text" name="nama_santri" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">NISN</label>
              <input type="number" name="nisn" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">NIK</label>
              <input type="number" name="nik" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Jenis Kelamin</label>
              <input type="text" name="jenis_kelamin" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Tanggal Lahir</label>
              <input type="text" name="tanggal_lahir" class="form-control datepicker" placeholder="DD/MM/YYYY" autocomplete="off" required>
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Alamat Lengkap</label>
              <input type="text" name="alamat_lengkap" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Tahun Lulus</label>
              <input type="number" name="tahun_lulus" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Nama Wali</label>
              <input type="text" name="nama_wali" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">NIK Wali</label>
              <input type="number" name="nik_wali" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Alamat Wali</label>
              <input type="text" name="alamat_wali" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Pekerjaan Wali</label>
              <input type="text" name="pekerjaan_wali" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Nomor telepon</label>
              <input type="number" name="nomor_telepon" class="form-control">
            </div>         
            <div class="mb-3">
              <label for="id_sekolah" class="form-label">Pilihan Sekolah</label>
              <select name="id_sekolah" class="form-control">
                <option value="">Pilih Sekolah</option>
                  @foreach ($sekolah as $item)
                      <option value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                  @endforeach
              </select>
          </div>
          <div class="mb-3">
            <label for="exampleInput" class="form-label">Foto 4x3</label>
            <input type="file" name="foto" class="form-control">
          </div>
          
            
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>



@endsection