@extends('layouts.app')

@section('title', 'SIMKU')

@section('bagian', 'Daftar Kode')

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
                            <th>Kode</th>
                            <th>Nama Lembaga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>01</td>
                            <td>Madin Putra</td>
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
