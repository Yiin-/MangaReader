<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TitleName extends Model
{
    protected $fillable = [
        'name'
    ];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }
}
