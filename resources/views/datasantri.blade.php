@extends('layouts.app')

@section('title', 'SIMKU')

@section('bagian', 'Data Santri')

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
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kelas Formal</th>
                            <th>Kelas Madin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>Said</td>
                            <td>Sambirampak Kidul</td>
                            <td>7 SMP</td>
                            <td>3A</td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>Agil</td>
                            <td>Sambirampak Kidul</td>
                            <td>8 SMP</td>
                            <td>3B</td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>Asyari</td>
                            <td>Sambirampak Kidul</td>
                            <td>9 SMP</td>
                            <td>3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
