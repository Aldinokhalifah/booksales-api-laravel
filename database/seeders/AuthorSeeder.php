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

        $now = Carbon::now();

        DB::table('authors')->insert([
            [
                'id' => 1,
                'name' => 'Agus Santoso',
                'photo' => 'agus.jpg',
                'bio' => 'Pengembang web dan pengajar Laravel dengan pengalaman 8 tahun.',
                'created_at' => $now,  
                'updated_at' => $now 
            ],
            [
                'id' => 2,
                'name' => 'Rina Wijaya',
                'photo' => 'rina.jpg',
                'bio' => 'Spesialis backend PHP yang aktif berbagi artikel dan tutorial.',
                'created_at' => $now,  
                'updated_at' => $now 
            ],
            [
                'id' => 3,
                'name' => 'Dedi Kurniawan',
                'photo' => 'dedi.jpg',
                'bio' => 'Arsitek perangkat lunak fokus pada desain API dan skalabilitas.',
                'created_at' => $now,  
                'updated_at' => $now 
            ],
            [
                'id' => 4,
                'name' => 'Siti Nurhaliza',
                'photo' => 'siti.jpg',
                'bio' => 'Database engineer yang menulis tentang normalisasi dan optimasi query.',
                'created_at' => $now,  
                'updated_at' => $now 
            ],
            [
                'id' => 5,
                'name' => 'Budi Prasetyo',
                'photo' => 'budi.jpg',
                'bio' => 'DevOps & QA advocate, penggemar CI/CD dan otomasi pengujian.',
                'created_at' => $now,  
                'updated_at' => $now 
            ],
        ]);
    }
}
