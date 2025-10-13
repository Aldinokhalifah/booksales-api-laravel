<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $genres = [
        'Romance',
        'Adventure',
        'Science Fiction',
        'Thriller',
        'Horor'
    ];

    public function getGenres() {
        return $this->genres;
    }
}
