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
        $now = Carbon::now();

        DB::table('books')->insert([
            [
                'id' => 1,
                'title' => 'Belajar Laravel 101',
                'description' => 'Pendahuluan tentang framework Laravel untuk pemula.',
                'price' => 150000,
                'atock' => 50,
                'cover_photo' => 'laravel101.jpg',
                'author' => 'Agus Santoso',
                'genre_id' => 1,
                'author_id' => 1,
                'created_at' => $now, 
                'updated_at' => $now 
            ],
            [
                'id' => 2,
                'title' => 'PHP Modern',
                'description' => 'Praktik terbaik dan fitur-fitur terbaru PHP.',
                'price' => 175000,
                'atock' => 45,
                'cover_photo' => 'phpmodern.jpg',
                'author' => 'Rina Wijaya',
                'genre_id' => 1,
                'author_id' => 2,
                'created_at' => $now, 
                'updated_at' => $now 
            ],
            [
                'id' => 3,
                'title' => 'Arsitektur RESTful API',
                'description' => 'Mendesain dan mengimplementasi API yang scalable.',
                'price' => 200000,
                'atock' => 30,
                'cover_photo' => 'restapi.jpg',
                'author' => 'Dedi Kurniawan',
                'genre_id' => 2,
                'author_id' => 3,
                'created_at' => $now, 
                'updated_at' => $now 
            ],
            [
                'id' => 4,
                'title' => 'Desain Database untuk Aplikasi',
                'description' => 'Konsep normalisasi, relasi, dan optimasi query.',
                'price' => 185000,
                'atock' => 40,
                'cover_photo' => 'database.jpg',
                'author' => 'Siti Nurhaliza',
                'genre_id' => 3,
                'author_id' => 4,
                'created_at' => $now, 
                'updated_at' => $now 
            ],
            [
                'id' => 5,
                'title' => 'Testing dan CI/CD',
                'description' => 'Strategi pengujian otomatis dan pipeline CI/CD.',
                'price' => 165000,
                'atock' => 35,
                'cover_photo' => 'testing.jpg',
                'author' => 'Budi Prasetyo',
                'genre_id' => 2,
                'author_id' => 5,
                'created_at' => $now, 
                'updated_at' => $now 
            ],
        ]);
    }
}
