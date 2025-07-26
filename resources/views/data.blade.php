@extends('layouts.app')

@section('title', 'SIMKU')

@section('bagian', 'Data')

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
                            <th>Rencana Waktu</th>
                            <th>QTY</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>111</td>
                            <td>Kuas Cat</td>
                            <td>Januari</td>
                            <td>3 Buah</td>
                            <td>5000</td>
                            <td>15000</td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>111</td>
                            <td>Kuas Cat</td>
                            <td>Januari</td>
                            <td>3 Buah</td>
                            <td>5000</td>
                            <td>15000</td>
                        </tr>
                        <tr>
                            <td>01</td>
                            <td>111</td>
                            <td>Kuas Cat</td>
                            <td>Januari</td>
                            <td>3 Buah</td>
                            <td>5000</td>
                            <td>15000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
