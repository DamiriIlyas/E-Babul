@extends('layout.app')

@section('title', 'Halaman Pembayaran')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Form Pembayaran</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pembayaran.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="santri_id">Nama Santri:</label>
                    <select name="santri_id" id="santri_id" class="form-control" required>
                        <option value="">Pilih Santri</option>
                        @foreach ($santris as $santri)
                            @if ($santri->tagihan->isNotEmpty())
                                @foreach ($santri->tagihan as $tagihan)
                                    <option value="{{ $santri->id }}" data-tagihan="{{ $tagihan->jumlah }}">{{ $santri->nama_santri }}</option>
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_pembayaran">Nama Pembayaran:</label>
                    <select name="tagihan_id" id="nama_pembayaran" class="form-control" required>
                        <option value="">Pilih Pembayaran</option>
                        @foreach ($tagihans as $tagihan)
                            <option value="{{ $tagihan->id }}" data-tagihan="{{ $tagihan->jumlah }}">{{ $tagihan->deskripsi }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="total_tagihan">Total Tagihan:</label>
                    <input type="text" name="total_tagihan" id="total_tagihan" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="jumlah_bayar">Jumlah Bayar:</label>
                    <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Bayar</button>
            </form>
        </div>
    </div>

    <script>
        const santriSelect = document.getElementById('santri_id');
        const pembayaranSelect = document.getElementById('nama_pembayaran');
        const totalTagihanInput = document.getElementById('total_tagihan');

        santriSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const tagihan = selectedOption.getAttribute('data-tagihan');

            totalTagihanInput.value = tagihan;
        });

        pembayaranSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const tagihan = selectedOption.getAttribute('data-tagihan');

            totalTagihanInput.value = tagihan;
        });
    </script>
@endsection
