<?php
namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::with('kategori')->get();
        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('buku.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id_kategori',
            'judul'       => 'required|string|max:255|unique:buku',
            'deskripsi'   => 'required|string',
            'penulis'     => 'required|string|max:255',
            'cover'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'      => 'required|in:aktif,nonaktif',
        ]);

        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        Buku::create([
            'kategori_id' => $request->kategori_id,
            'judul'       => $request->judul,
            'deskripsi'   => $request->deskripsi,
            'penulis'     => $request->penulis,
            'cover'       => $coverPath,
            'status'      => $request->status,
        ]);

        return redirect()->route('master.data.buku.index')
                         ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $buku = Buku::with('kategori')->findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id);
        $kategoris = Kategori::all();
        return view('buku.edit', compact('buku', 'kategoris'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id_kategori',
            'judul'       => 'required|string|max:255|unique:buku,judul,' . $id . ',id_buku',
            'deskripsi'   => 'required|string',
            'penulis'     => 'required|string|max:255',
            'cover'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'      => 'required|in:aktif,nonaktif',
        ]);

        $buku = Buku::findOrFail($id);

        if ($request->hasFile('cover')) {
            if ($buku->cover && file_exists(storage_path('app/public/' . $buku->cover))) {
                unlink(storage_path('app/public/' . $buku->cover));
            }
            $coverPath = $request->file('cover')->store('covers', 'public');
        } else {
            $coverPath = $buku->cover;
        }

        $buku->update([
            'kategori_id' => $request->kategori_id,
            'judul'       => $request->judul,
            'deskripsi'   => $request->deskripsi,
            'penulis'     => $request->penulis,
            'cover'       => $coverPath,
            'status'      => $request->status,
        ]);

        return redirect()->route('master.data.buku.index')
                         ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->cover && file_exists(storage_path('app/public/' . $buku->cover))) {
            unlink(storage_path('app/public/' . $buku->cover));
        }

        $buku->delete();

        return redirect()->route('master.data.buku.index')
                         ->with('success', 'Buku berhasil dihapus.');
    }
}

