@extends('layout.app')

@section('title','sekolah')

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Sekolah</h6>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-4">
            <a href="/tambahsekolah" class="btn btn-primary btn-sm">Tambah</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Sekolah</th>
                        <th>Jumlah Santri</th>
                        <th>Aksi</th>
                    </tr>
                <tbody>
                    @foreach ($sekolah as $s)
                        
                    <tr>
                        <td>{{$s->nama_sekolah}}</td>
                        <td>200</td>
                        <td>
                            <a href="{{route('edit.sekolah', $s->id)}}" class="btn btn-info btn-sm">edit</a>
                            <a href="{{route('hapus.sekolah', $s->id)}}" class="btn btn-danger btn-sm">hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection