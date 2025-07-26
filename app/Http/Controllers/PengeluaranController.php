<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $data = Pengeluaran::all();
        return view('pengeluaran', compact('data'));
    }

    public function create()
    {
        // $data = Pemasukan::all();
        return view('tambah-pengeluaran');
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

        Pengeluaran::create($request->all());
        return redirect('pengeluaran')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = Pengeluaran::findOrFail($id);
        return view('ubah-pengeluaran', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->update($request->all());

        return redirect('pengeluaran')->with('success', 'Data berhasil diubah');
    }
    

    public function destroy(string $id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->delete();

        return redirect('pengeluaran')->with('success', 'Data berhasil dihapus');
    }
}
