@extends('layouts.app')

@section('title', 'SIMKU')

@section('bagian', 'Home')

@section('content')

    <div class="col-sm-6 col-lg-4">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <p class="text-light">RAB Saya</p>
                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Jumlah Anggaran 1 Tahun</p>
                <div class="chart-wrapper px-0" style="height:10px;" height="10">
                    <canvas id="widgetChart1"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-4">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <p class="text-light">Realisasi</p>
                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Jumlah Anggaran Yang Terpakai</p>
                <div class="chart-wrapper px-0" style="height:10px;" height="10">
                    <canvas id="widgetChart1"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-4">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <p class="text-light">RAB Saya</p>
                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Jumlah Anggaran 1 Tahun</p>
                <div class="chart-wrapper px-0" style="height:10px;" height="10">
                    <canvas id="widgetChart1"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Bar chart </h4>
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>
@endsection
