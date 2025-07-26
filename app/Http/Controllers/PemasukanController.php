<?php

namespace App\Http\Controllers;

use App\Exports\PemasukanExport;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PemasukanController extends Controller
{
    public function index()
    {
        $data = Pemasukan::all();
        return view('pemasukan', compact('data'));
    }

    public function create()
    {
        // $data = Pemasukan::all();
        return view('tambah-pemasukan');
    }


    public function store(Request $request)
    {
        $request->validate([
            'uraian' => 'required|string',
            'nominal' => 'required|numeric',
            'tanggal' => 'required|date',
            'tahun' => 'required|digits:4',
            'penerima' => 'required|string',
        ]);
        // dd($request->all());
        Pemasukan::create($request->all());
        return redirect('pemasukan')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = Pemasukan::findOrFail($id);
        return view('ubah-pemasukan', compact('data'));
    }

    public function update(Request $request, string $id)
    {

        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->update($request->all());

        return redirect('pemasukan')->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->delete();

        return redirect('pemasukan')->with('success', 'Data berhasil dihapus');
    }
    public function export(Request $request)
    {
        $request->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
        ]);

        // Debug data
        $dataCount = Pemasukan::whereBetween('tanggal', [
            $request->tanggal_awal,
            $request->tanggal_akhir
        ])->count();

        if ($dataCount === 0) {
            return back()->with('error', 'Tidak ada data pada rentang tanggal ' .
                $request->tanggal_awal . ' hingga ' . $request->tanggal_akhir);
        }

        try {
            $export = new PemasukanExport($request->tanggal_awal, $request->tanggal_akhir);

            return Excel::download(
                $export,
                'Laporan_Pemasukan_' . $request->tanggal_awal . '_sd_' . $request->tanggal_akhir . '.xlsx'
            );
        } catch (\Exception $e) {
            \Log::error('Export Error: ' . $e->getMessage());
            return back()->with('error', 'Gagal export: ' . $e->getMessage());
        }
    }
}
