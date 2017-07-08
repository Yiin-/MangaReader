<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    protected $fillable = [
        'number',
        'image_url'
    ];

    public function chapter()
    {
        $this->belongsTo(Chapter::class);
    }
}
