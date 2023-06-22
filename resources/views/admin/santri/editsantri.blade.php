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
            <button type="submit" class="btn btn-primary">Simpan</button>

          </form>
    </div>
</div>

@endsection