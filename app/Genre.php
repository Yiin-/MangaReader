<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    protected $fillable = [
        'name'
    ];

    public function titles()
    {
        return $this->belongsToMany(Title::class, 'title_genres');
    }
}
