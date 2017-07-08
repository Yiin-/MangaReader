<?php

namespace App\Services;


use App\Title;

class SearchService
{
    public function search($query)
    {
        $titles = Title::where('title', 'LIKE', "%$query%")
            ->orWhereHas('title_names', function ($query) use ($query) {
                $query->where('name', 'LIST', "%$query%");
            });

        return $titles;
    }
}