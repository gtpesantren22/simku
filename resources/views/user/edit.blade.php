@extends('layouts.app')

@section('title', 'SIMKU')

@section('bagian', 'Pengajuan')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Pengajuan KPA</strong>
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
                <form method="POST" action="{{ route('user.update', $userCek->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="name"
                            value="{{ old('name', $userCek->name) }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ old('email', $userCek->email) }}">
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" class="form-control">
                            <option value="">-pilih jenis-</option>
                            <option value="admin" {{ $userCek->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ $userCek->role == 'user' ? 'selected' : '' }}>User/KPA</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="lembaga">Lembaga</label>
                        <select name="lembaga_id" class="form-control">
                            <option value="">-pilih jenis-</option>
                            @foreach ($lembagas as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $userCek->lembaga_id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-sm btn-success" type="submit">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
