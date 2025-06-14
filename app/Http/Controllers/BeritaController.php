<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index() {
        $beritas = Berita::with('kategori', 'user')->paginate(10);
        return view('berita.index', compact('beritas'));
    }

    public function create() {
        $kategoris = Kategori::all();
        return view('berita.create', compact('kategoris'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $path = $file->store('berita', 'public');
            $validated['gambar'] = $path;
        }

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'draft';

        Berita::create($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dibuat.');
    }

    public function edit(Berita $berita) {
        $kategoris = Kategori::all();
        return view('berita.edit', compact('berita', 'kategoris'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Cek apakah ada gambar baru diupload
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('berita', 'public');
            $validated['gambar'] = $path;
        } else {
            // Pastikan gambar lama tetap dipertahankan jika user tidak upload ulang
            unset($validated['gambar']);
        }

        // Update model
        $berita->update($validated);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diupdate.');
    }



    public function destroy(Berita $berita) {
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    // Approval untuk editor
    public function approve(Berita $berita) {
        $berita->status = 'published';
        $berita->save();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dipublish.');
    }

    public function unpublish(Berita $berita)
    {
        $berita->status = 'draft';
        $berita->save();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil di-unpublish.');
    }

}