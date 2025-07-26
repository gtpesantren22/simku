@extends('layouts.app')

@section('title', 'SIMKU')

@section('bagian', 'Saldo Realisasi')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Table</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Uraian</th>
                            <th>Nominal</th>
                            <th>Tanggal Bayar</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>Tindakan Haflah</td>
                            <td>120000</td>
                            <td>12 November 2025</td>
                            <td>2025</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Ubah</a>
                                {{-- <form action="{{ route('hapus-pemasukan', $pemasukan->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus pemasukan ini?')">Hapus</button>
                                    </form> --}}
                                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
