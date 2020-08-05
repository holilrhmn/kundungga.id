<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Tag extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    public function sluggable()
    {
        return [
            'slug' => [
                'source'=>'name',
                'onUpdate'=>true
            ]
        ];
    }

    protected $guarded = [];

    public function artikel(){
    	return $this->belongsToMany('App\Artikel');
    }
}
