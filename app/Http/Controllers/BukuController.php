<?php

namespace App\Http\Controllers;

use App\Models\Buku;
<<<<<<< HEAD
use App\Models\Kategori;
=======
>>>>>>> 6aa88fca2337b38beb9cbd5d5c8dfb68c97e36e8
use Illuminate\Http\Request;

class BukuController extends Controller
{
<<<<<<< HEAD
    public function __construct()
    {
        
        $this->middleware('auth');

        // hanya admin boleh akses method ini
        $this->middleware('admin')->except(['index']);
    }

    /**
     * USER + ADMIN
     * tampilkan list buku
     */
    public function index()
    {
        $buku = Buku::with('kategori')->get();
        return view('buku.index', compact('buku'));
    }

    /**
     * ADMIN
     * form tambah buku
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('buku.create', compact('kategori'));
    }

    /**
     * ADMIN
     * simpan buku
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode'       => 'required|string|max:20|unique:buku,kode',
            'judul'      => 'required|string|max:150',
            'pengarang'  => 'required|string|max:100',
            'idkategori' => 'required|exists:kategori,idkategori',
        ]);

        Buku::create([
            'kode'       => $request->kode,
            'judul'      => $request->judul,
            'pengarang'  => $request->pengarang,
            'idkategori' => $request->idkategori,
        ]);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * ADMIN
     * form edit buku
     */
    public function edit(Buku $buku)
    {
        $kategori = Kategori::all();
        return view('buku.edit', compact('buku', 'kategori'));
    }

    /**
     * ADMIN
     * update buku
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'kode'       => 'required|string|max:20|unique:buku,kode,' . $buku->idbuku . ',idbuku',
            'judul'      => 'required|string|max:150',
            'pengarang'  => 'required|string|max:100',
            'idkategori' => 'required|exists:kategori,idkategori',
        ]);

        $buku->update([
            'kode'       => $request->kode,
            'judul'      => $request->judul,
            'pengarang'  => $request->pengarang,
            'idkategori' => $request->idkategori,
        ]);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil diupdate');
    }

    /**
     * ADMIN
     * hapus buku
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil dihapus');
    }
}
=======
    public function createBuku(Request $Request) {
        $validated = $Request->validate([
            'judul' => 'required|min:3|max:500|string',
            'pengarang' => 'required|min:3|max:200|string',
            'idkategori' => 'required|exists:kategori,idkategori'
        ]);

        try {
            Buku::create([
                'judul' => $validated['judul'],
                'pengarang' => $validated['pengarang'],
                'idkategori' => $validated['idkategori']
            ]);
            return redirect(route('book'))->with('success', 'Sukses menambahkan buku');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: '.$e->getMessage());
        }
    }

    public function updateBuku(Request $Request) {
        $validated = $Request->validate([
            'judul' => 'required|min:3|max:500|string',
            'pengarang' => 'required|min:3|max:200|string',
            'idkategori' => 'required|exists:kategori,idkategori'
        ]);

        try {
            $buku = Buku::findOrFail($Request['idbuku']);
            $buku->update([
                'judul' => $validated['judul'],
                'pengarang' => $validated['pengarang'],
                'idkategori' => $validated['idkategori']
            ]);

            return redirect(route('book'))->with('success', 'Berhasil Edit Buku');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: '.$e->getMessage());
        }
    }

    public function deleteBuku($id) {
        try {
            $buku = Buku::findOrFail($id);
            $buku->delete();
            return redirect(route('book'))->with('success', 'Berhasil Hapus Buku');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: '.$e->getMessage());
        }
    }
}

#1#
>>>>>>> 6aa88fca2337b38beb9cbd5d5c8dfb68c97e36e8
