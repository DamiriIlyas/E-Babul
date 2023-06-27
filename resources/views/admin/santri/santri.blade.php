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
                        <th>Alamat Lengkap</th>
                        <th>Asal Sekolah</th>
                        <th>Tahun Lulus</th>
                        <th>Nama Wali</th>
                        <th>NIK Wali</th>
                        <th>Alamat Wali</th>
                        <th>Pekerjaan Wali</th>
                        <th>Nomor Telepon</th>
                    </tr>
                <tbody>
                    @foreach ($santri as $no => $s)
                    <tr>
                    <th scope="row">{{ ++$no }}</th>
                    <td>{{ $s->nama_santri }}</td>
                    <td>{{ $s->nisn }}</td>
                    <td>{{ $s->nik }}</td>
                    <td>{{ $s->jenis_kelamin }}</td>
                    <td>{{ $s->tempat_lahir }}</td>
                    <td>{{ $s->tanggal_lahir }}</td>
                    <td>{{ $s->alamat_lengkap }}</td>
                    <td>{{ $s->asal_sekolah }}</td>
                    <td>{{ $s->tahun_lulus }}</td>
                    <td>{{ $s->nama_wali }}</td>
                    <td>{{ $s->nik_wali }}</td>
                    <td>{{ $s->alamat_wali }}</td>
                    <td>{{ $s->pekerjaan_wali }}</td>
                    <td>{{ $s->nomor_telepon }}</td>
                    <td>
                        <td>
                            <a href="" class="btn btn-info btn-sm">edit</a>
                            <a href="" class="btn btn-danger btn-sm">hapus</a>
                        </td>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection