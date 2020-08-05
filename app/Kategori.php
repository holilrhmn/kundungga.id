<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $guarded = [];

    public function artikel()
    {
        return $this->hasMany(Artikel::class);
    }

    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }
}
