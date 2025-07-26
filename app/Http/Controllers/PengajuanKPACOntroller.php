<?php

namespace App\Http\Controllers;

use App\Models\DetailPengajuan;
use App\Models\Lembaga;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengajuanKPACOntroller extends Controller
{
    //
    public function index()
    {
        $user = auth()->user(); // ambil user login
        $lembagaId = $user->lembaga_id;

        // Ambil semua pengajuan yang dimiliki oleh lembaga user
        $pengajuans = Pengajuan::where('lembaga_id', $lembagaId)->get();
        $lembaga = Lembaga::find($lembagaId);

        return view('kpa.pengajuan-kpa', compact('pengajuans', 'user', 'lembaga'));
    }

    public function detail(string $id)
    {
        $pengajuan = Pengajuan::find($id);
        $details = DetailPengajuan::where('pengajuan_id', $id)->get();
        $lembaga = Lembaga::find($pengajuan->lembaga_id);
        $total = $total = $details->sum(fn($item) => $item->harga * $item->qty);

        return view('kpa.pengajuan-kpa-detail', compact('details', 'pengajuan', 'lembaga', 'total'));
    }

    public function tambah(Request $req)
    {
        $valid = $req->validate([
            'lembaga_id' => 'required',
            'tanggal' => 'required',
        ]);

        $pengajuanAktif = Pengajuan::where('lembaga_id', $valid['lembaga_id'])
            ->where('status', '!=', 'selesai')
            ->exists();

        if ($pengajuanAktif) {
            // Jika masih ada pengajuan belum selesai, tolak pengajuan baru
            return back()->with('error', 'Masih ada pengajuan yang belum selesai.');
        }

        // Format lembaga ke 2 digit (01, 02, dst.)
        $kodeLembaga = str_pad($valid['lembaga_id'], 2, '0', STR_PAD_LEFT);
        $jumlahPengajuan = Pengajuan::where('lembaga_id', $valid['lembaga_id'])->count() + 1;
        $urutan = str_pad($jumlahPengajuan, 3, '0', STR_PAD_LEFT);
        $nomor = "{$urutan}.{$kodeLembaga}";

        Pengajuan::create([
            'no' => $nomor,
            'tanggal' => $valid['tanggal'],
            'status' => 'proses',
            'lembaga_id' => $valid['lembaga_id'],
        ]);
        return redirect('pengajuan-kpa')->with('success', 'Data berhasil ditambahkan!');
    }

    public function addItem(Request $req)
    {
        $valid = $req->validate([
            'pengajuan_id' => 'required',
            'nama_item' => 'required',
            'qty' => 'required|numeric',
            'harga' => 'required|numeric',
            'satuan' => 'required',
        ]);

        $statusPengajuan = Pengajuan::where('id', $valid['pengajuan_id'])
            ->where('status', 'proses')
            ->exists();
        if (!$statusPengajuan) {
            return back()->with('error', 'Tambah item tidak bisa. Pengajuan sudah diajukan.');
        }

        DetailPengajuan::create($valid);
        return redirect()
            ->route('pengajuan-kpa.detail', ['id' => $valid['pengajuan_id']])
            ->with('success', 'Item berhasil ditambahkan!');
    }
    public function hapus(string $id)
    {
        $pengajuan = DetailPengajuan::findOrFail($id);

        $statusPengajuan = Pengajuan::where('id', $pengajuan->pengajuan_id)
            ->where('status', 'proses')
            ->exists();
        if (!$statusPengajuan) {
            return back()->with('error', 'Hapus item tidak bisa. Pengajuan sudah diajukan.');
        }

        $id_pj = $pengajuan->pengajuan_id;
        $pengajuan->delete();

        return redirect()
            ->route('pengajuan-kpa.detail', ['id' => $id_pj])
            ->with('success', 'Item berhasil dihapus!');
    }
    public function ajukan(Request $req)
    {
        $valid = $req->validate([
            'pengajuan_id' => 'required',
        ]);

        $pengajuan = Pengajuan::findOrFail($valid['pengajuan_id']);
        $pengajuan->status = 'diajukan';
        $pengajuan->save();

        return redirect('pengajuan-kpa')->with('success', 'Pengajuan Berhasil!');
    }
}
