@extends('layout.app')

@section('title','Edit Pembayaran')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pembayaran/h6>
    </div>
    <div class="card-body">
        <form action="{{url('update_pembayaran/'. $pembayaran->id)}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Total Pembayaran</label>
              <input type="text" name="nama_santri" value="{{$pembayaran->total_pembayaran}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>

          </form>
    </div>
</div>

@endsection