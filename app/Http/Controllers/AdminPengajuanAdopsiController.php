<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Models\PengajuanAdopsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPengajuanAdopsiController extends Controller
{
    public function index()
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $pengajuan = PengajuanAdopsi::with(['user', 'hewan'])
            ->latest('id_pengajuan')
            ->get();

        return view('pengajuan.index', compact('pengajuan'));
    }

    public function update(Request $request, $id_pengajuan)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $data = $request->validate([
            'status_pengajuan' => 'required|in:disetujui,ditolak',
            'catatan_admin' => 'nullable|string|max:2000',
        ]);

        $berhasil = DB::transaction(function () use ($id_pengajuan, $data) {
            $item = PengajuanAdopsi::where('id_pengajuan', $id_pengajuan)
                ->lockForUpdate()
                ->firstOrFail();

            if ($item->status_pengajuan !== 'pending') {
                return false;
            }

            $hewan = Hewan::where('id_hewan', $item->id_hewan)
                ->lockForUpdate()
                ->firstOrFail();

            if (
                $data['status_pengajuan'] === 'disetujui'
                && $hewan->status_adopsi !== 'diproses'
            ) {
                return false;
            }

            $item->update([
                'status_pengajuan' => $data['status_pengajuan'],
                'catatan_admin' => $data['catatan_admin'] ?? null,
            ]);

            $hewan->update([
                'status_adopsi' => $data['status_pengajuan'] === 'disetujui'
                    ? 'diadopsi'
                    : 'tersedia',
            ]);

            return true;
        });

        if (! $berhasil) {
            return redirect()
                ->route('admin.pengajuan.index')
                ->with('error', 'Pengajuan sudah diproses atau status hewan sudah berubah.');
        }

        return redirect()
            ->route('admin.pengajuan.index')
            ->with('success', 'Status pengajuan berhasil diperbarui.');
    }
}
