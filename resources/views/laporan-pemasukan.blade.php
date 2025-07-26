@extends('layouts.app')

@section('title', 'SIMKU')

@section('bagian', 'Laporan Pemasukan')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Pemasukan</strong>

            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pemasukan.export') }}" method="GET" class="mb-3">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <label class="form-label">Tanggal Awal</label>
                            <input type="date" name="tanggal_awal" class="form-control"
                                value="{{ old('tanggal_awal', now()->startOfMonth()->format('Y-m-d')) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" class="form-control"
                                value="{{ old('tanggal_akhir', now()->format('Y-m-d')) }}" required>
                        </div>
                        <div class="col-md-4 mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-file-excel me-2"></i> Export Excel
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.getElementById('exportForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = document.getElementById('exportBtn');
            btn.disabled = true;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Processing...';

            // Log parameters sebelum submit
            console.log('Parameters:', {
                tanggal_awal: this.tanggal_awal.value,
                tanggal_akhir: this.tanggal_akhir.value
            });

            this.submit();
        });
    </script>
@endsection
