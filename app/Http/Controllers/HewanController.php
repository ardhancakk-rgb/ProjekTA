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
            'id_kategori' => 'required|exists:kategori_hewan,id_kategori',
            'nama_hewan' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'ras' => 'nullable|string|max:255',
            'umur' => 'required|integer|min:0',
            'jenis_kelamin' => 'required|in:jantan,betina',
            'berat' => 'nullable|numeric',
            'status_kesehatan' => 'nullable|string|max:255',
            'status_vaksin' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'deskripsi' => 'nullable|string',
            'status_adopsi' => 'required|in:tersedia,diproses,diadopsi',
        ]);

        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('hewan', 'public');
        }

        Hewan::create($validatedData);

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
            'id_kategori' => 'required|exists:kategori_hewan,id_kategori',
            'nama_hewan' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'ras' => 'nullable|string|max:255',
            'umur' => 'required|integer|min:0',
            'jenis_kelamin' => 'required|in:jantan,betina',
            'berat' => 'nullable|numeric',
            'status_kesehatan' => 'nullable|string|max:255',
            'status_vaksin' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'deskripsi' => 'nullable|string',
            'status_adopsi' => 'required|in:tersedia,diproses,diadopsi',
        ]);

        if ($request->hasFile('foto')) {
            if ($hewan->foto) {
                Storage::disk('public')->delete($hewan->foto);
            }
            $validatedData['foto'] = $request->file('foto')->store('hewan', 'public');
        }

        $hewan->update($validatedData);

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
?>