@extends('layout.app')

@section('title','Tambah Pembayaran')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Total Pembayaran</h6>
    </div>
    <div class="card-body">
        <form action="/post_pembayaran" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleInput" class="form-label">Nominal Pembayaran</label>
              <input type="text" name="total_pembayaran" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
    </div>
</div>

@endsection