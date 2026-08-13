<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    // GET
    public function index()
    {
        // GET
        // 
        $pesertas = Peserta::orderBy('id', 'DESC')->get();
        $title = "Data Peserta";
        return view('peserta.index', compact('pesertas', 'title'));
    }
    // view baru
    public function create()
    {
        $title = "Tambah Data Peserta Baru";
        return view('peserta.create', compact('title'));
    }
    // Post
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|email|unique:pesertas,email',
            'usia' => 'required',
            'address' => 'nullable'
        ]);


        // $nama = $request->input('nama');
        // $nama = $request->nama;
        // $umur = $request->input('umur');
        // $umur = $request->umur;

        // INSERT INTO pesertas () VALUES ()

        Peserta::create([
            'name' => $request->nama,
            'email' => $request->email,
            'age' => $request->usia,
            'address' => $request->address
        ]);
        return redirect()->to('peserta');
    }
    public function edit(string $id)
    {
        $title = "Edit Data Peserta";
        $peserta = Peserta::find($id);
        return view('peserta.edit', compact('peserta', 'title'));
    }

    // PUT/PATCH: Memperbarui data peserta di database
    public function update(Request $request, string $id)
    {
        $peserta = Peserta::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:50',
            // Validasi 'unique' mengecualikan ID peserta ini sendiri agar tidak error saat email tidak diubah
            'email' => 'required|email|unique:pesertas,email,' . $id,
            'usia' => 'required|integer',
            'address' => 'nullable'
        ]);

        $peserta->update([
            'name' => $request->nama,
            'email' => $request->email,
            'age' => $request->usia,
            'address' => $request->address
        ]);

        return redirect()->to('peserta')->with('success', 'Data peserta berhasil diubah!');
    }

    // DELETE: Menghapus data peserta dari database
    public function delete(string $id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect()->to('peserta')->with('success', 'Data peserta berhasil dihapus!');
    }
}
