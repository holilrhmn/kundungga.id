<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raja extends Model
{
    protected $guarded = [];

    public function kerajaan()
    {
        return $this->belongsTo(Kerajaan::class);
    }
}
