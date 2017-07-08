<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    protected $fillable = [
        'number',
        'name',
        'url'
    ];

    public function manga()
    {
        return $this->belongsTo(Manga::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
