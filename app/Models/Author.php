<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $authors = [
        'Siti Anisah',
        'Mamad Kamarudin',
        'Rohayu Anindia',
        'Ujang Kasep',
        'Melinda Puspita'
    ];

    public function getAuthors() {
        return $this->authors;
    }
}
