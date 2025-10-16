<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $now = Carbon::now();

        DB::table('genres')->insert([
            [
                'id' => 1,
                'name' => 'Programming',
                'description' => 'Buku-buku tentang pemrograman dan pengembangan software.',
                'created_at' => $now, 
                'updated_at' => $now 
            ],
            [
                'id' => 2,
                'name' => 'Web Development',
                'description' => 'Buku-buku tentang pengembangan aplikasi web.',
                'created_at' => $now, 
                'updated_at' => $now 
            ],
            [
                'id' => 3,
                'name' => 'Database',
                'description' => 'Buku-buku tentang database dan manajemen data.',
                'created_at' => $now, 
                'updated_at' => $now 
            ],
            [
                'id' => 4,
                'name' => 'Software Architecture',
                'description' => 'Buku-buku tentang arsitektur software dan design patterns.',
                'created_at' => $now, 
                'updated_at' => $now 
            ],
            [
                'id' => 5,
                'name' => 'DevOps',
                'description' => 'Buku-buku tentang DevOps, CI/CD, dan cloud computing.',
                'created_at' => $now, 
                'updated_at' => $now 
            ],
        ]);
    }
}
