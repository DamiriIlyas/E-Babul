@extends('layout.app')

@section('title','Santri')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Peserta</h6>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-4">
            <a href="/tambahsantri" class="btn btn-primary btn-sm">Tambah</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>NISN</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Sekolah</th>
                    </tr>
                <tbody>
                    @foreach ($santri as $s)
                        
                    <tr>
                        <td>{{$s->nama_santri}}</td>
                        <td>200</td>
                        <td>
                            <a href="{{route('edit.santri', $s->id)}}" class="btn btn-info btn-sm">edit</a>
                            <a href="{{route('hapus.santri', $s->id)}}" class="btn btn-danger btn-sm">hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection