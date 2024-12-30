<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil semua buku beserta kategori terkait
        // $bukus = Buku::with('kategori')->get();
    
        // Mengambil semua buku dengan status 'aktif' beserta kategori
        // $bukus = Buku::with('kategori')->where('status', 'aktif')->get();
    
        // Mengambil semua buku dengan status 'aktif', diurutkan berdasarkan tanggal pembuatan terbaru
        // $bukus = Buku::with('kategori')->where('status', 'aktif')->orderBy('created_at', 'DESC')->get();
    
        // Mengambil hanya 2 buku terbaru dengan status 'aktif', diurutkan berdasarkan tanggal pembuatan
        $bukus = buku::with('kategori') // Mengambil relasi kategori untuk setiap buku
            ->where('status', 'aktif') // Menyaring buku dengan status aktif
            ->orderBy('created_at', 'DESC') // Mengurutkan berdasarkan tanggal pembuatan terbaru
            ->get() // Mengambil semua data yang sesuai dengan kondisi di atas
            ->take(2); // Membatasi hanya 2 buku terbaru yang diambil
    
        // Mengembalikan tampilan 'dashboard.index' dengan data buku
        return view('dashboard.index', compact('bukus'));
    
        //belajar query mysql vs ORM
        // $query = Buku::select('id_buku', 'judul', 'penulis', 'status')->get();
    
        // $query = Buku::orderBy('created_at', 'DESC')
        //      ->get()
        //      ->take(2)
            //  ->map(function ($q) {
            //     return [
            //         'id_buku' => $q->id_buku,
            //         'judul' => $q->judul,
            //         'penulis' => $q->penulis,
            //         'deskripsi' => collect(explode('', $q->deskripsi))take(5)->implode(' '). '   ',
            //         'status' => $q->status
            //         'tanggal' => Carbon::parse($q->created_at)->translatedFormad('d F Y')
            //         'nama_kategori => $q->kategori->nama
            //     ];
            // });
        // return $query();
    }
}
