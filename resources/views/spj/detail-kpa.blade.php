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
            </div>
            <div class="card-body">
                @if ($spj && $spj->nama_file != '')
                    <p>Upload Ulang SPJ</p>
                    <form action="{{ route('spj.upload_spj') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="pengajuan_id" value="{{ $pengajuan->id }}">
                        <label for="nama_file">Upload File (PDF, max 10MB):</label>
                        <input type="file" name="nama_file" accept="application/pdf" required>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
                    </form>
                    <a href="{{ route('spj.view', $spj->id) }}" target="_blank" class="btn btn-sm btn-success">
                        <i class="fa fa-eye"></i> Lihat SPJ
                    </a>
                @else
                    <p>Belum Upload SPJ</p>
                    <form action="{{ route('spj.upload_spj') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="pengajuan_id" value="{{ $pengajuan->id }}">
                        <label for="nama_file">Upload File (PDF, max 10MB):</label>
                        <input type="file" name="nama_file" accept="application/pdf" required>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload</button>
                    </form>

                    {{-- Menampilkan error --}}
                    @if ($errors->any())
                        <div style="color:red;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Sukses --}}
                    @if (session('success'))
                        <div style="color:green;">
                            {{ session('success') }}
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

@endsection
