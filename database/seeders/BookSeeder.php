<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('books')->insert([
            ['id' => 1, 'judul' => 'Belajar Laravel 101', 'author' => 'Agus Santoso', 'description' => 'Pendahuluan tentang framework Laravel untuk pemula.'],
            ['id' => 2, 'judul' => 'PHP Modern', 'author' => 'Rina Wijaya', 'description' => 'Praktik terbaik dan fitur-fitur terbaru PHP.'],
            ['id' => 3, 'judul' => 'Arsitektur RESTful API', 'author' => 'Dedi Kurniawan', 'description' => 'Mendesain dan mengimplementasi API yang scalable.'],
            ['id' => 4, 'judul' => 'Desain Database untuk Aplikasi', 'author' => 'Siti Nurhaliza', 'description' => 'Konsep normalisasi, relasi, dan optimasi query.'],
            ['id' => 5, 'judul' => 'Testing dan CI/CD', 'author' => 'Budi Prasetyo', 'description' => 'Strategi pengujian otomatis dan pipeline CI/CD.'],
        ]);
    }
}
