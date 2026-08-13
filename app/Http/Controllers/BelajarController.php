<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index()
    {
        return view('counting');
    }
    public function indexTambah()
    {
        $hasilTambah = 0;
        return view('tambah', compact('hasilTambah'));
    }
    public function indexKurang()
    {
        $hasilKurang = 0;
        return view('kurang', compact('hasilKurang'));
    }
    public function indexKali()
    {
        $hasilKali = 0;
        return view('kali', compact('hasilKali'));
    }
    public function indexBagi()
    {
        $hasilBagi = 0;
        return view('bagi', compact('hasilBagi'));
    }
    public function greeting()
    {
        return "Selamat datang di Kelas Laravel";
    }
    public function tambah(Request $request)
    {
        // $_POST['angka1']; $request->angka1
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $hasilTambah = $angka1 + $angka2;
        return view('tambah', compact('hasilTambah'));
    }
    public function kurang(Request $request)
    {
        // $_POST['angka1']; $request->angka1
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $hasilKurang = $angka1 - $angka2;
        return view('kurang', compact('hasilKurang'));
    }
    public function kali(Request $request)
    {
        // $_POST['angka1']; $request->angka1
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $hasilKali = $angka1 * $angka2;
        return view('kali', compact('hasilKali'));
    }
    // public function bagi(Request $request)
    // {
    //     // Validasi input dari user
    //     $request->validate([
    //         'angka1' => 'required|numeric',
    //         'angka2' => 'required|numeric|not_in:0', // Memastikan tidak boleh 0
    //     ]);

    //     $angka1 = $request->angka1;
    //     $angka2 = $request->angka2;

    //     $hasilBagi = $angka1 / $angka2;

    //     return view('bagi', compact('hasilBagi'));
    // }
    public function bagi(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        // Cek apakah angka2 kosong atau nol
        if ($angka2 == 0 || empty($angka2)) {
            $hasilBagi = 0; // Nilai alternatif jika pembagi adalah nol
        } else {
            $hasilBagi = $angka1 / $angka2;
        }

        return view('bagi', compact('hasilBagi'));
    }
}
