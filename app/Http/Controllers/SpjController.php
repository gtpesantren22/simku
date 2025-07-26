<?php

namespace App\Http\Controllers;

use App\Models\DetailPengajuan;
use App\Models\Lembaga;
use App\Models\Pencairan;
use App\Models\Pengajuan;
use App\Models\Spj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpjController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        $lembagaId = $user->lembaga_id;
        $lembaga = Lembaga::find($lembagaId);

        if ($user->role == 'admin') {
            $pengajuans = Pengajuan::all();
        } else {
            $pengajuans = Pengajuan::where('lembaga_id', $lembagaId)->get();
        }
        return view('spj.index', compact('pengajuans', 'lembaga'));
    }

    public function cek(string $id)
    {
        //
        $user = auth()->user();
        $pengajuan = Pengajuan::find($id);
        $details = DetailPengajuan::where('pengajuan_id', $id)->get();
        $lembaga = Lembaga::find($user->lembaga_id);
        $spj = Spj::where('pengajuan_id', $id)->first();
        $total = $total = $details->sum(fn($item) => $item->harga * $item->qty);
        $cair = Pencairan::where('pengajuan_id', $id)->first();

        if ($user->role == 'admin') {
            return view('spj.detail-admin', compact('details', 'pengajuan', 'lembaga', 'spj', 'cair', 'total'));
        } else {
            return view('spj.detail-kpa', compact('details', 'pengajuan', 'lembaga', 'spj', 'cair', 'total'));
        }
    }

    public function upload_spj(Request $request)
    {
        $request->validate([
            'nama_file' => 'required|file|mimes:pdf|max:10240', // 10MB
            'pengajuan_id' => 'required'
        ]);

        $file = $request->file('nama_file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        // $file->storeAs('public/uploads', $fileName);
        $file->storeAs('uploads', $fileName, 'public');

        $pengajuan = Spj::where('pengajuan_id', $request->get('pengajuan_id'))->first();

        if ($pengajuan) {
            // Jika data sudah ada, update file_spj
            $pengajuan->update([
                'nama_file' => $fileName,
            ]);
        } else {
            // Jika belum ada, maka buat data baru
            Spj::create([
                'pengajuan_id' => $request->get('pengajuan_id'),
                'nama_file'     => $fileName,
            ]);
        }

        return back()->with('success', 'File berhasil diupload!');
    }

    public function view($id)
    {
        $spj = Spj::findOrFail($id);

        // Pastikan nama file ada
        if (!$spj->nama_file || !Storage::disk('public')->exists("uploads/{$spj->nama_file}")) {
            return abort(404, 'File SPJ tidak ditemukan');
        }

        $filePath = storage_path("app/public/uploads/{$spj->nama_file}");

        return response()->file($filePath);
        // dd($filePath);
    }

    public function setujui(Request $req)
    {
        $valid = $req->validate([
            'pengajuan_id' => 'required',
        ]);

        $pengajuan = Pengajuan::findOrFail($valid['pengajuan_id']);
        $pengajuan->status = 'selesai';
        $pengajuan->save();

        return redirect('pengajuan')->with('success', 'Pengajuan Berhasil Diselesaikan!');
    }
}
