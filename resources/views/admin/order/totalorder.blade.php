@extends('layout.app')

@section('title','Total Oredr')

@section('content')

ass="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Total Pembayaran</h6>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-4">
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Total Pembayaran</th>
                        <th>Nama Santri</th>
                        <th>Nomor Telepon</th>
                        <th>Sekolah</th>
                    </tr>
                <tbody>
                    @foreach ($pembayaran as $s)
                    <th scope="row">{{ ++$no }}</th>
                    <tr>
                        <td>{{$s->qty}}</td>
                        <td>200</td>
                        <td>{{$s->name}}</td>
                        <td>200</td>
                        <td>{{$s->qty}}</td>
                        <td>200</td>
                        <td>{{$s->phone}}</td>
                        <td>200</td>
                        <td>{{$s->adress}}</td>
                        <td>200</td>
                        <td>
                            {{-- <a href="{{route('edit.sekolah', $s->id)}}" class="btn btn-info btn-sm">edit</a>
                            <a href="{{route('hapus.sekolah', $s->id)}}" class="btn btn-danger btn-sm">hapus</a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection