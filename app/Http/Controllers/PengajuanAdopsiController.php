<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Models\PengajuanAdopsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengajuanAdopsiController extends Controller
{
    public function create($id_hewan)
    {
        $hewan = Hewan::findOrFail($id_hewan);

        if ($hewan->status_adopsi !== 'tersedia') {
            return redirect()
                ->route('pets.index')
                ->with('error', 'Hewan ini tidak tersedia untuk diadopsi.');
        }

        return view('pengajuan.create', compact('hewan'));
    }

    public function store(Request $request, $id_hewan)
    {
        $data = $request->validate([
            'telepon_pemohon' => 'required|string|max:20',
            'alamat_pemohon' => 'required|string|max:1000',
            'alasan_adopsi' => 'required|string|max:2000',
        ]);

        $hasil = DB::transaction(function () use ($id_hewan, $data) {
            $hewan = Hewan::where('id_hewan', $id_hewan)
                ->lockForUpdate()
                ->firstOrFail();

            if ($hewan->status_adopsi !== 'tersedia') {
                return false;
            }

            PengajuanAdopsi::create([
                'id_user' => auth()->id(),
                'id_hewan' => $hewan->id_hewan,
                'tanggal_pengajuan' => now()->toDateString(),
                'status_pengajuan' => 'pending',
                'telepon_pemohon' => $data['telepon_pemohon'],
                'alamat_pemohon' => $data['alamat_pemohon'],
                'alasan_adopsi' => $data['alasan_adopsi'],
            ]);

            $hewan->update([
                'status_adopsi' => 'diproses',
            ]);

            return true;
        });

        if (! $hasil) {
            return redirect()
                ->route('pets.index')
                ->with('error', 'Hewan sudah diproses atau tidak tersedia.');
        }

        return redirect()
            ->route('pengajuan.riwayat')
            ->with('success', 'Pengajuan adopsi berhasil dikirim!');
    }

    public function riwayat()
    {
        $pengajuan = PengajuanAdopsi::with('hewan')
            ->where('id_user', auth()->id())
            ->latest('id_pengajuan')
            ->get();

        return view('pengajuan.riwayat', compact('pengajuan'));
    }
}
