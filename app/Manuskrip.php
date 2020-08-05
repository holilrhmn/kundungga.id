<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manuskrip extends Model
{
    protected $guarded = [];

    public function kerajaan()
    {
        return $this->belongsTo(Kerajaan::class);
    }
}
