<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Title extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function names()
    {
        return $this->hasMany(TitleName::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'title_genres');
    }

    public function manga()
    {
        return $this->hasMany(Manga::class);
    }
}
