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

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Pengajuan KPA</strong>
                @if ($pengajuan->status == 'diajukan')
                    <form action="{{ route('pengajuan.setujui') }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Yakin akan akan disetujui?')">
                        @csrf
                        <input type="hidden" name="pengajuan_id" value="{{ $pengajuan->id }}">
                        <button class="btn btn-sm btn-success pull-right" type="submit"><i class="fa fa-check-circle"></i>
                            Setujui
                            Pengajuan</button>
                    </form>
                    <form action="{{ route('pengajuan.tolak') }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Yakin akan akan ditolak?')">
                        @csrf
                        <input type="hidden" name="pengajuan_id" value="{{ $pengajuan->id }}">
                        <button class="btn btn-sm btn-danger pull-right" type="submit"><i class="fa fa-times"></i>
                            Tolak
                            Pengajuan</button>
                    </form>
                @endif
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
                            <th colspan="1">Rp. {{ number_format($total) }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
