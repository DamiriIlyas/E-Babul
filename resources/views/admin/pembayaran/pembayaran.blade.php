@extends('layout.app')

@section('title','Pembayaran')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lunas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Sekolah</th>
                        <th>Total Pembayaran</th>
                    </tr>
                <tbody>
                   </tr>
                    <tr>
                        <td>Ahmad Nur Kholis</td>
                        <td>Madrasah Tsanawiyah</td>
                        <td>Rp.700.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection