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
                <strong class="card-title">Input Item Pengajuan</strong>
                <button class="btn btn-sm btn-success pull-right"><i class="fa fa-arrow-left"></i> Kembali</button>
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
                <form action="{{ route('pengajuan-kpa.addItem') }}" method="post">
                    @csrf
                    <input type="hidden" name="pengajuan_id" value="{{ $pengajuan->id }}">
                    <div class="form-group">
                        <label for="nama">Nomor Pengajuan</label>
                        <input type="text" value="{{ $pengajuan->no }}" readonly class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Item</label>
                        <input type="text" name="nama_item" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" name="satuan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="qty">QTY</label>
                        <input type="number" name="qty" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Pengajuan KPA</strong>
                <form action="{{ route('pengajuan-kpa.ajukan') }}" method="POST" style="display:inline;"
                    onsubmit="return confirm('Yakin akan dilanjutkan ke bendahara?')">
                    @csrf
                    <input type="hidden" name="pengajuan_id" value="{{ $pengajuan->id }}">
                    <button class="btn btn-sm btn-success pull-right" type="submit"><i class="fa fa-upload"></i> Ajukan
                        Dana</button>
                </form>
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
                            <th>#</th>
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
                                <td>
                                    <form action="{{ route('pengajuan-kpa.del', $p->id) }}" method="POST"
                                        style="display:inline;" onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>

                                </td>
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
