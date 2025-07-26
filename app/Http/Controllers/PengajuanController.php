<?php

namespace App\Http\Controllers;

use App\Models\DetailPengajuan;
use App\Models\Lembaga;
use App\Models\Pencairan;
use App\Models\Pengajuan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = auth()->user();
        $lembagaId = $user->lembaga_id;
        $lembaga = Lembaga::find($lembagaId);

        $pengajuans = Pengajuan::all();
        return view('pengajuan.index', compact('pengajuans', 'lembaga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pengajuan = Pengajuan::find($id);
        $details = DetailPengajuan::where('pengajuan_id', $id)->get();
        $lembaga = Lembaga::find($pengajuan->lembaga_id);
        $total = $total = $details->sum(fn($item) => $item->harga * $item->qty);

        return view('pengajuan.detail', compact('details', 'pengajuan', 'lembaga', 'total'));
    }
    public function cair(string $id)
    {
        //
        $pengajuan = Pengajuan::find($id);
        if ($pengajuan->status != 'disetujui') {
            return redirect()->back()->with('error', 'Pengajuan belum disetujui');
        }
        $details = DetailPengajuan::where('pengajuan_id', $id)->get();
        $lembaga = Lembaga::find($pengajuan->lembaga_id);
        $total = $total = $details->sum(fn($item) => $item->harga * $item->qty);

        return view('pengajuan.cair', compact('details', 'pengajuan', 'lembaga', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function setujui(Request $req)
    {
        $valid = $req->validate([
            'pengajuan_id' => 'required',
        ]);

        $pengajuan = Pengajuan::findOrFail($valid['pengajuan_id']);
        $pengajuan->status = 'disetujui';
        $pengajuan->save();

        return redirect('pengajuan')->with('success', 'Pengajuan Berhasil Disetujui!');
    }
    public function tolak(Request $req)
    {
        $valid = $req->validate([
            'pengajuan_id' => 'required',
        ]);

        $pengajuan = Pengajuan::findOrFail($valid['pengajuan_id']);
        $pengajuan->status = 'proses';
        $pengajuan->save();

        return redirect('pengajuan')->with('error', 'Pengajuan Ditolak!');
    }

    public function cairkan(Request $req)
    {
        $valid = $req->validate([
            'pengajuan_id' => 'required',
            'tanggal' => 'required',
            'nominal' => 'required',
        ]);

        $pengajuan = Pengajuan::find($valid['pengajuan_id']);
        $lembaga = Lembaga::find($pengajuan->lembaga_id);

        Pencairan::create([
            'pengajuan_id' => $valid['pengajuan_id'],
            'tanggal' => $valid['tanggal'],
            'nominal' => $valid['nominal'],
        ]);
        Pengeluaran::create([
            'uraian' => 'Pencairan pengajuan nomor ' . $pengajuan->no . '-' . $lembaga->nama,
            'tanggal' => $valid['tanggal'],
            'nominal' => $valid['nominal'],
            'tahun' => date('Y'),
            'penerima' => 'KPA ' . $lembaga->nama,
        ]);

        $pengajuan = Pengajuan::findOrFail($valid['pengajuan_id']);
        $pengajuan->status = 'dicairkan';
        $pengajuan->save();

        return redirect('pengajuan')->with('success', 'Pengajuan Berhasil dicairkan!');
    }
}
