@extends('layouts.app')

@section('title', 'SIMKU')

@section('bagian', 'SPJ')

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
                            <th>Nama Barang</th>
                            <th>Persetujuan</th>
                            <th>Pencairan</th>
                            <th>SPJ</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>$320,800</td>
                            <td>$320,800</td>
                            <td>$320,800</td>
                            <td>$320,800</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
