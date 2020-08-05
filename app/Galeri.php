<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $guarded = [];
    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable()
    {
        return [
            'slug' => [
                'source'=>'title',
                'onUpdate'=>true
            ]
        ];
    }

    public function kerajaan()
    {
        return $this->belongsTo(Kerajaan::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
