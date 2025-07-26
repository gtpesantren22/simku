@extends('layouts.app')

@section('title', 'Tambah Pengeluaran')

@section('bagian', 'Pengeluaran')

@section('content')

    <form action="{{ route('pengeluaran.store') }}" method="POST">
        @csrf
        <div class="col-md-12">
            <div class="card">
                <div class="card-body card-block">
                    <div class="form-group"><label for="uraian" class=" form-control-label">Uraian</label>
                        <input type="text" id="uraian" placeholder="Uraian" name="uraian" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal</label>
                        <input type="number" class="form-control" id="Nominal" name="nominal"
                            placeholder="Masukan nominal">
                    </div>
                    <div class="form-group"><label for="tgl" class=" form-control-label">Tanggal</label>
                        <input type="date" id="tgl" placeholder="Tanggal" name="tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tahun" class="form-control-label">Tahun</label>
                        <input type="number" id="tahun" placeholder="Tahun" name="tahun" class="form-control"
                            maxlength="4">
                    </div>
                    <div class="form-group"><label for="penerima" class=" form-control-label">Penerima</label>
                        <input type="text" id="penerima" placeholder="Nama Penerima" name="penerima"
                            class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    {{-- <a href="{{ route('pemasukan') }}" class="btn btn-warning">Kembali</a> --}}
                </div>
            </div>
        </div>
    </form>

@endsection
