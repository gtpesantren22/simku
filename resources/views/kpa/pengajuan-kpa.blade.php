@extends('layouts.app')

@section('title', 'SIMKU')

@section('bagian', 'Pengajuan')

@section('content')

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Pengajuan KPA</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Pengajuan</th>
                            <th>Lembaga</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengajuans as $i => $p)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $p->no }}</td>
                                <td>{{ $lembaga->nama }}</td>
                                <td>{{ $p->tanggal }}</td>
                                <td>{{ $p->status }}</td>
                                <td>
                                    <button onclick="window.location='{{ route('pengajuan-kpa.detail', $p->id) }}'"
                                        class="btn btn-sm btn-warning">Detail</button>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Belum ada pengajuan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Form Buat Pengajuan Baru</strong>
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
                <form action="{{ route('pengajuan-kpa.add') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Lembaga</label>
                        <input type="hidden" name="lembaga_id" value="{{ $lembaga->id }}">
                        <input type="text" value="{{ $lembaga->nama }}" readonly class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

@endsection
