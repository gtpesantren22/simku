@extends('layouts.app')

@section('title', 'SIMKU')

@section('bagian', 'Data Master')

@section('content')

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Lembaga</strong>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                @endif
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lembaga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</button>
                                    {{-- <a href="{{ route('lembaga.destroy') }}"
                                        onclick="return confirm('Yakin akan menghapus data ?')"
                                        class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Form Tambah</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('lembaga.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Lembaga</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

@endsection
