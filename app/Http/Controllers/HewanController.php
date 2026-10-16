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
        $hewan = Hewan::with('kategori')
            ->latest('id_hewan')
            ->get();

        return view('hewan.index', compact('hewan'));
    }

    public function create()
    {
        $kategori = Kategori::all();

        return view('hewan.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori_id' => 'required|exists:kategori_hewan,id_kategori',
            'nama' => 'required|string|max:255',
            'ras' => 'nullable|string|max:255',
            'umur' => 'required|integer|min:0',
            'jenis_kelamin' => 'required|in:jantan,betina',
            'berat' => 'nullable|numeric|min:0',
            'kondisi_kesehatan' => 'nullable|string|max:255',
            'status_vaksin' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:tersedia,diproses,diadopsi',
        ]);

        $data['id_kategori'] = $data['kategori_id'];
        $data['nama_hewan'] = $data['nama'];
        $data['status_kesehatan'] = $data['kondisi_kesehatan'] ?? null;
        $data['status_adopsi'] = $data['status'];

        unset(
            $data['kategori_id'],
            $data['nama'],
            $data['kondisi_kesehatan'],
            $data['status']
        );

        if ($request->hasFile('gambar')) {
            $data['foto'] = $request->file('gambar')
                ->store('hewan', 'public');
        }

        unset($data['gambar']);

        Hewan::create($data);

        return redirect()
            ->route('hewan.index')
            ->with('success', 'Data hewan berhasil ditambahkan!');
    }

    public function edit(Hewan $hewan)
    {
        $kategori = Kategori::all();

        return view('hewan.edit', compact('hewan', 'kategori'));
    }

    public function update(Request $request, Hewan $hewan)
    {
        $data = $request->validate([
            'kategori_id' => 'required|exists:kategori_hewan,id_kategori',
            'nama' => 'required|string|max:255',
            'ras' => 'nullable|string|max:255',
            'umur' => 'required|integer|min:0',
            'jenis_kelamin' => 'required|in:jantan,betina',
            'berat' => 'nullable|numeric|min:0',
            'kondisi_kesehatan' => 'nullable|string|max:255',
            'status_vaksin' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:tersedia,diproses,diadopsi',
        ]);

        $data['id_kategori'] = $data['kategori_id'];
        $data['nama_hewan'] = $data['nama'];
        $data['status_kesehatan'] = $data['kondisi_kesehatan'] ?? null;
        $data['status_adopsi'] = $data['status'];

        unset(
            $data['kategori_id'],
            $data['nama'],
            $data['kondisi_kesehatan'],
            $data['status']
        );

        if ($request->hasFile('gambar')) {
            if ($hewan->foto) {
                Storage::disk('public')->delete($hewan->foto);
            }

            $data['foto'] = $request->file('gambar')
                ->store('hewan', 'public');
        }

        unset($data['gambar']);

        $hewan->update($data);

        return redirect()
            ->route('hewan.index')
            ->with('success', 'Data hewan berhasil diperbarui!');
    }

    public function destroy(Hewan $hewan)
    {
        if ($hewan->foto) {
            Storage::disk('public')->delete($hewan->foto);
        }

        $hewan->delete();

        return redirect()
            ->route('hewan.index')
            ->with('success', 'Data hewan berhasil dihapus!');
    }
}
