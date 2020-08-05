<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Artikel extends Model implements Viewable
{
    use InteractsWithViews;
    use Sluggable;
    use SluggableScopeHelpers;
    protected $guarded = [];

    public function sluggable()
    {
        return [
            'slug' => [
                'source'=>'judul',
                'onUpdate'=>true
            ]
        ];
    }
    public function getRouteKeyName(){
        return 'slug';
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

    public function tag(){
    	return $this->belongsToMany('App\Tag');
    }
}
