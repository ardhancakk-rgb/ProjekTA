<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Models\PengajuanAdopsi;
use Illuminate\Http\Request;

class PengajuanAdopsiController extends Controller
{
    // Menampilkan formulir adopsi
    public function create($id_hewan)
    {
        $hewan = Hewan::where('id_hewan', $id_hewan)
            ->firstOrFail();

        return view('adopsi.create', compact('hewan'));
    }

    // Menyimpan pengajuan ke database
    public function store(Request $request, $id_hewan)
    {
        $hewan = Hewan::where('id_hewan', $id_hewan)
            ->firstOrFail();

        if ($hewan->status !== 'tersedia') {
            return back()->with(
                'error',
                'Hewan ini tidak tersedia untuk diadopsi.'
            );
        }

        $sudahMengajukan = PengajuanAdopsi::where(
            'id_user', auth()->id()
        )->where('id_hewan', $hewan->id_hewan)
         ->where('status', 'pending')
         ->exists();

        if ($sudahMengajukan) {
            return back()->with(
                'error',
                'Kamu sudah mengajukan adopsi hewan ini.'
            );
        }

        PengajuanAdopsi::create([
            'id_user' => auth()->id(),
            'id_hewan' => $hewan->id_hewan,
            'tanggal_pengajuan' => now(),
            'status' => 'pending',
        ]);

        return redirect()->route('adopsi.create', $hewan->id_hewan)
            ->with('success', 'Pengajuan adopsi berhasil dikirim.');
    }
}
