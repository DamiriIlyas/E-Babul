@extends('layout.app')

@section('title','Santri')

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Tabel Pendaftaran</h6>
    </div>
    <div class="card-body">
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
                   </tr>
                    <tr>
                        <td>Ahmad Nur Kholis</td>
                        <td>64286066</td>
                        <td>3514112603000002</td>
                        <td>Laki-laki</td>
                        <td>Pasuruan</td>
                        <td>20/09/2002</td>
                        <td>MTs Babul Futuh</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection