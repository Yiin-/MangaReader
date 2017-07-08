<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Source extends Model
{
    protected $fillable = [
        'name',
        'url'
    ];

    public function manga()
    {
        return $this->hasMany(Manga::class);
    }

    public function titles()
    {
        return $this->hasManyThrough(Title::class, Manga::class);
    }
}
