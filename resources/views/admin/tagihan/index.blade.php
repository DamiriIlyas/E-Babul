@extends('layout.app')

@section('title','Tagihan')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Tagihan</h6>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-end mb-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Tambah Tagihan
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jumlah Tagihan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tagihan as $no => $item)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            {{-- <a href="{{ route('tagihan.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('tagihan.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tagihan ini?')">Hapus</button>
                            </form> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tagihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tagihan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="jumlah">Jumlah Tagihan</label>
                        <input type="number" name="jumlah" value="{{ old('jumlah') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" value="{{ old('deskripsi') }}" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Tagihan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
