@extends('layouts.app')

@section('title', 'SIMKU')

@section('bagian', 'Pengajuan')

@section('content')

    <div class="col-md-12">
        <p>-> Status Pengajuan :
            @if ($pengajuan->status == 'proses')
                <b class="text-danger"><i class="fa fa-times"></i> Belum diajukan</b>
            @else
                <b class="text-success"><i class="fa fa-check-circle"></i> Sudah diajukan</b>
            @endif
        </p>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Input Pencairan</strong>
                {{-- <button class="btn btn-sm btn-success pull-right"><i class="fa fa-arrow-left"></i> Kembali</button> --}}
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Berhasil</span>
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif (session('error'))
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger">Gagal</span>
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{ route('pengajuan.cairkan') }}" method="post">
                    @csrf
                    <input type="hidden" name="pengajuan_id" value="{{ $pengajuan->id }}">
                    <div class="form-group">
                        <label for="nama">Nomor Pengajuan</label>
                        <input type="text" value="{{ $pengajuan->no }}" readonly class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="number" name="nominal" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Proses Pencairan</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Item</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($details as $i => $p)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $p->nama_item }}</td>
                                <td>{{ $p->satuan }}</td>
                                <td>Rp. {{ number_format($p->harga) }}</td>
                                <td>{{ $p->qty }}</td>
                                <td>Rp. {{ number_format($p->harga * $p->qty) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum data.</td>
                            </tr>
                        @endforelse
                        <tr>
                            <th colspan="5">TOTAL</th>
                            <th colspan="2">Rp. {{ number_format($total) }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
