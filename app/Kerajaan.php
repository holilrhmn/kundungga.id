<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Kerajaan extends Model
{
    protected $guarded = [];
    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable()
    {
        return [
            'slug' => [
                'source'=>'nama_kerajaan',
                'onUpdate'=>true
            ]
        ];
    }
    public function raja()
    {
        return $this->hasMany(Raja::class);
    }

    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }

    public function manuskrip()
    {
        return $this->hasMany(Manuskrip::class);
    }

    public function artikel()
    {
        return $this->hasMany(Artikel::class);
    }

}
