<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    // Menampilkan profil user
    public function index()
    {
        return view('profile.index', [
            'user' => Auth::user(),
        ]);
    }

    // Menampilkan form edit profil
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    // Menyimpan perubahan profil
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'no_hp' => ['nullable', 'string', 'max:20'],
            'alamat' => ['nullable', 'string', 'max:1000'],
        ]);

        $user->fill($validated);
        $user->save();

        return redirect()
            ->route('profile.index')
            ->with('success', 'Profil berhasil diperbarui!');
    }

    // Menampilkan riwayat pengajuan adopsi
    public function riwayat()
    {
        $riwayat = DB::table('pengajuan_adopsi')
            ->leftJoin(
                'hewan',
                'pengajuan_adopsi.id_hewan',
                '=',
                'hewan.id_hewan'
            )
            ->where('pengajuan_adopsi.id_user', Auth::id())
            ->select(
                'pengajuan_adopsi.*',
                'hewan.nama as nama_hewan'
            )
            ->orderByDesc('pengajuan_adopsi.tanggal_pengajuan')
            ->get();

        return view('profile.riwayat', [
            'riwayat' => $riwayat,
        ]);
    }
}