<?php

namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HewanController extends Controller
{
    public function index()
    {
        $hewan = Hewan::with('kategori')->latest('id_hewan')->get();

        return view('hewan.index', compact('hewan'));
    }

    public function create()
    {
        $kategori = Kategori::all();

        return view('hewan.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_kategori' => 'required|exists:kategori,id',
            'nama_hewan' => 'required|string|max:255',
            'ras' => 'nullable|string|max:255',
            'umur' => 'required|integer|min:0',
            'jenis_kelamin' => 'required|in:jantan,betina',
            'berat' => 'nullable|numeric',
            'status_kesehatan' => 'nullable|string|max:255',
            'status_vaksin' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status_adopsi' => 'required|in:tersedia,diproses,diadopsi',
        ]);

        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('hewan', 'public');
        }

        Hewan::create([
            'kategori_id' => $validatedData['id_kategori'],
            'nama' => $validatedData['nama_hewan'],
            'ras' => $validatedData['ras'] ?? null,
            'umur' => $validatedData['umur'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'berat' => $validatedData['berat'] ?? null,
            'kondisi_kesehatan' => $validatedData['status_kesehatan'] ?? null,
            'status_vaksin' => $validatedData['status_vaksin'] ?? null,
            'gambar' => $validatedData['foto'] ?? null,
            'status' => $validatedData['status_adopsi'],
        ]);

        return redirect()->route('hewan.index')->with('success', 'Data hewan berhasil ditambahkan!');
    }

    public function edit(Hewan $hewan)
    {
        $kategori = Kategori::all();

        return view('hewan.edit', compact('hewan', 'kategori'));
    }

    public function update(Request $request, Hewan $hewan)
    {
        $validatedData = $request->validate([
            'id_kategori' => 'required|exists:kategori,id',
            'nama_hewan' => 'required|string|max:255',
            'ras' => 'nullable|string|max:255',
            'umur' => 'required|integer|min:0',
            'jenis_kelamin' => 'required|in:jantan,betina',
            'berat' => 'nullable|numeric',
            'status_kesehatan' => 'nullable|string|max:255',
            'status_vaksin' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status_adopsi' => 'required|in:tersedia,diproses,diadopsi',
        ]);

        if ($request->hasFile('foto')) {
            if ($hewan->foto) {
                Storage::disk('public')->delete($hewan->foto);
            }
            $validatedData['foto'] = $request->file('foto')->store('hewan', 'public');
        }

        $hewan->update([
            'kategori_id' => $validatedData['id_kategori'],
            'nama' => $validatedData['nama_hewan'],
            'ras' => $validatedData['ras'] ?? null,
            'umur' => $validatedData['umur'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'berat' => $validatedData['berat'] ?? null,
            'kondisi_kesehatan' => $validatedData['status_kesehatan'] ?? null,
            'status_vaksin' => $validatedData['status_vaksin'] ?? null,
            'gambar' => $validatedData['foto'] ?? $hewan->gambar,
            'status' => $validatedData['status_adopsi'],
        ]);

        return redirect()->route('hewan.index')->with('success', 'Data hewan berhasil diperbarui!');
    }

    public function destroy(Hewan $hewan)
    {
        if ($hewan->foto) {
            Storage::disk('public')->delete($hewan->foto);
        }

        $hewan->delete();

        return redirect()->route('hewan.index')->with('success', 'Data hewan berhasil dihapus!');
    }
}
