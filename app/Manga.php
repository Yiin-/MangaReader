<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manga extends Model
{
    protected $table = 'manga';

    protected $fillable = [
        'cover_url',
        'url'
    ];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function genres()
    {
        return $this->hasManyThrough(Genre::class, Title::class);
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
