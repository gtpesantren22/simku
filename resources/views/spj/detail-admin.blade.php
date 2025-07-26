@extends('layouts.app')

@section('title', 'SIMKU')

@section('bagian', 'Pengajuan')

@section('content')

    <div class="col-md-12">
        <p>-> Status Spj :
            @if ($spj && $spj->nama_file != '')
                <b class="text-success"><i class="fa fa-check-circle"></i> Sudah Upload</b>
            @else
                <b class="text-danger"><i class="fa fa-times"></i> Belum Upload</b>
            @endif
        </p>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Pengajuan KPA</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <tr>
                        <th>Lembaga</th>
                        <td>{{ $lembaga->nama }}</td>
                    </tr>
                    <tr>
                        <th>Nomor</th>
                        <td>{{ $pengajuan->no }}</td>
                    </tr>
                    <tr>
                        <th>Nominal</th>
                        <td>Rp. {{ number_format($total) }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pencairan</th>
                        <td>{{ $cair->tanggal }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Pengajuan KPA</strong>
                @if ($spj && $spj->nama_file != '')
                    <form action="{{ route('spj.setujui') }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Yakin akan akan disetujui?')">
                        @csrf
                        <input type="hidden" name="pengajuan_id" value="{{ $pengajuan->id }}">
                        <button class="btn btn-sm btn-success pull-right" type="submit"><i class="fa fa-check-circle"></i>
                            Setujui dan Selesaikan
                            Pengajuan</button>
                    </form>
                @endif
            </div>
            <div class="card-body">
                @if ($spj && $spj->nama_file != '')
                    <p>Lihat FIle SPJ</p>
                    <a href="{{ route('spj.view', $spj->id) }}" target="_blank" class="btn btn-sm btn-success">
                        <i class="fa fa-eye"></i> Lihat SPJ
                    </a>
                @else
                    <p>Belum Upload SPJ</p>
                @endif
            </div>
        </div>
    </div>

@endsection
