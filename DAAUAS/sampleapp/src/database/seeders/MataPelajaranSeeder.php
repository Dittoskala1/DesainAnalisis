<?php

// database/seeders/MataPelajaranSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataPelajaran;

class MataPelajaranSeeder extends Seeder
{
    public function run()
    {
        // Mendefinisikan array $mataPelajarans
        $mataPelajarans = [
            [
                'nama' => 'Matematika',
                'deskripsi' => 'Pelajaran Matematika dasar',
                'file_url' => 'https://example.com/materi/matematika.pdf',
            ],
            [
                'nama' => 'Bahasa Indonesia',
                'deskripsi' => 'Pelajaran Bahasa Indonesia',
                'file_url' => 'https://example.com/materi/indonesia.pdf',
            ],
            // Tambahkan mata pelajaran lainnya di sini jika perlu
        ];

        // Memasukkan data ke tabel mata_pelajarans
        foreach ($mataPelajarans as $mataPelajaran) {
            MataPelajaran::create($mataPelajaran);
        }
    }
}
