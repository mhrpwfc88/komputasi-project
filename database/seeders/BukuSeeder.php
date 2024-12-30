<?php

namespace Database\Seeders;

use App\Models\buku;
use App\Models\kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = kategori::all();
        // Pastikan ada kategori di database sebelum memasukkan data buku
        if ($kategori->isEmpty()) {
            $this->command->info('Tidak ada kategori yang ditemukan, pastikan data kategori sudah ada.');
            return;
        }
        // Inisialisasi Faker untuk menghasilkan data palsu
        $faker = Faker::create('id_ID'); // Menggunakan lokal Indonesia

        // Menambahkan 20 data buku
        for ($i = 1; $i <= 20; $i++) {
            buku::create([
                'kategori_id' => $kategori->random()->id_kategori, // Mengambil kategori secara acak
                'judul' => $faker->sentence(3), // Membuat judul buku secara acak
                'deskripsi' => $faker->paragraph(), // Membuat deskripsi buku secara acak
                'penulis' => $faker->name, // Nama penulis secara acak
                'cover' => 'https://via.placeholder.com/150', // URL gambar placeholder sebagai cover
                'status' => $faker->randomElement(['aktif', 'nonaktif']), // Status acak antara 'aktif' dan 'nonaktif'
            ]);
        }
        $this->command->info('20 data buku telah berhasil ditambahkan.');
    }

    
}
