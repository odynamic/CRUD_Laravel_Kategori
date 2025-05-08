<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    // Tampilkan semua kategori
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    // Tampilkan form create
    public function create()
    {
        return view('kategori.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    // Update data kategori
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'slug' => Str::slug($request->nama_kategori),
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Hapus kategori
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
