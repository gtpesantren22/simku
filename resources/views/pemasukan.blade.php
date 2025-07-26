@extends('layouts.app')

@section('title', 'SIMKU')

@section('bagian', 'Pemasukan')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Pemasukan</strong>
                <button class="btn btn-primary btn-sm pull-right"
                    onclick="window.location='{{ route('pemasukan.create') }}'"><i class="fa fa-plus-circle"></i> Tambah
                    Data</button>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table id="pemasukan-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Uraian</th>
                            <th>Nominal</th>
                            <th>Tanggal Bayar</th>
                            <th>Tahun</th>
                            <th>Penerima</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->uraian }}</td>
                                <td>{{ number_format($item->nominal, 0, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>{{ $item->penerima }}</td>
                                <td>
                                    <a href="{{ route('pemasukan.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning">Ubah</a> |
                                    <form action="{{ route('pemasukan.destroy', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center;">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#pemasukan-table').DataTable();
        });
    </script>
@endsection
