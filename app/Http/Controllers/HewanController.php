<?php
<<<<<<< HEAD
namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Models\KategoriHewan; // Pastikan model KategoriHewan sudah ada
=======

namespace App\Http\Controllers;

use App\Models\Hewan;
use App\Models\Kategori;
>>>>>>> 6e8f3ead6906a6e5dcec43610514393484f46453
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HewanController extends Controller
{
    public function index()
    {
        $hewan = Hewan::with('kategori')->latest('id_hewan')->get();
<<<<<<< HEAD
=======

>>>>>>> 6e8f3ead6906a6e5dcec43610514393484f46453
        return view('hewan.index', compact('hewan'));
    }

    public function create()
    {
<<<<<<< HEAD
        $kategori = KategoriHewan::all();
=======
        $kategori = Kategori::all();

>>>>>>> 6e8f3ead6906a6e5dcec43610514393484f46453
        return view('hewan.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
<<<<<<< HEAD
            'id_kategori' => 'required|exists:kategori_hewan,id_kategori',
            'nama_hewan' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
=======
            'id_kategori' => 'required|exists:kategori,id',
            'nama_hewan' => 'required|string|max:255',
>>>>>>> 6e8f3ead6906a6e5dcec43610514393484f46453
            'ras' => 'nullable|string|max:255',
            'umur' => 'required|integer|min:0',
            'jenis_kelamin' => 'required|in:jantan,betina',
            'berat' => 'nullable|numeric',
            'status_kesehatan' => 'nullable|string|max:255',
            'status_vaksin' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
<<<<<<< HEAD
            'deskripsi' => 'nullable|string',
=======
>>>>>>> 6e8f3ead6906a6e5dcec43610514393484f46453
            'status_adopsi' => 'required|in:tersedia,diproses,diadopsi',
        ]);

        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('hewan', 'public');
        }

<<<<<<< HEAD
        Hewan::create($validatedData);
=======
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
>>>>>>> 6e8f3ead6906a6e5dcec43610514393484f46453

        return redirect()->route('hewan.index')->with('success', 'Data hewan berhasil ditambahkan!');
    }

    public function edit(Hewan $hewan)
    {
<<<<<<< HEAD
        $kategori = KategoriHewan::all();
=======
        $kategori = Kategori::all();

>>>>>>> 6e8f3ead6906a6e5dcec43610514393484f46453
        return view('hewan.edit', compact('hewan', 'kategori'));
    }

    public function update(Request $request, Hewan $hewan)
    {
        $validatedData = $request->validate([
<<<<<<< HEAD
            'id_kategori' => 'required|exists:kategori_hewan,id_kategori',
            'nama_hewan' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
=======
            'id_kategori' => 'required|exists:kategori,id',
            'nama_hewan' => 'required|string|max:255',
>>>>>>> 6e8f3ead6906a6e5dcec43610514393484f46453
            'ras' => 'nullable|string|max:255',
            'umur' => 'required|integer|min:0',
            'jenis_kelamin' => 'required|in:jantan,betina',
            'berat' => 'nullable|numeric',
            'status_kesehatan' => 'nullable|string|max:255',
            'status_vaksin' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
<<<<<<< HEAD
            'deskripsi' => 'nullable|string',
=======
>>>>>>> 6e8f3ead6906a6e5dcec43610514393484f46453
            'status_adopsi' => 'required|in:tersedia,diproses,diadopsi',
        ]);

        if ($request->hasFile('foto')) {
            if ($hewan->foto) {
                Storage::disk('public')->delete($hewan->foto);
            }
            $validatedData['foto'] = $request->file('foto')->store('hewan', 'public');
        }

<<<<<<< HEAD
        $hewan->update($validatedData);
=======
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
>>>>>>> 6e8f3ead6906a6e5dcec43610514393484f46453

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
<<<<<<< HEAD
?>
=======
>>>>>>> 6e8f3ead6906a6e5dcec43610514393484f46453
