<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('authors')->insert([
            ['id' => 1, 'name' => 'Agus Santoso', 'bio' => 'Pengembang web dan pengajar Laravel dengan pengalaman 8 tahun.'],
            ['id' => 2, 'name' => 'Rina Wijaya', 'bio' => 'Spesialis backend PHP yang aktif berbagi artikel dan tutorial.'],
            ['id' => 3, 'name' => 'Dedi Kurniawan', 'bio' => 'Arsitek perangkat lunak fokus pada desain API dan skalabilitas.'],
            ['id' => 4, 'name' => 'Siti Nurhaliza', 'bio' => 'Database engineer yang menulis tentang normalisasi dan optimasi query.'],
            ['id' => 5, 'name' => 'Budi Prasetyo',  'bio' => 'DevOps & QA advocate, penggemar CI/CD dan otomasi pengujian.'],
        ]);
    }
}
