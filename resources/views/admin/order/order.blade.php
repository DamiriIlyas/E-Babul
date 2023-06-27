@extends('layout.app')

@section('title','Order')

@section('content')	

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pembayaran</h6>
    </div>
    <div class="card-body">
        <form action="/post_pembayaran" method="POST">
            @csrf
            <div class="mb-3">
              <label for="qty" class="form-label">Bayar Sekarang?</label>
              <input type="number" class="form-control" id="qty" placeholder="Jumlah Pembayaran">
            </div>
          <div class="mb-3">
              <label for="name" class="form-label">Nama Santri</label>
              <input type="text" class="form-control" id="name" placeholder="Masukkan Nama Anda">
            </div>
          <div class="mb-3">
              <label for="phone" class="form-label">No Telepon</label>
              <input type="number" class="form-control" id="phone" placeholder="Masukkan Nomor Anda">
            </div>
            <div class="mb-3">
              <label for="adress" class="form-label">Sekolah</label>
              <textarea class="form-control" id="adress" rows="3"></textarea>
            </div>
          
          <button type="submit" class="btn btn-primary">Chekout</button>
          </form>
    </div>
</div>

@endsection