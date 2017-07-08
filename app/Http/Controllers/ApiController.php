<?php

namespace App\Http\Controllers;

use App\Services\SearchService;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function search(Request $request, SearchService $searchService)
    {
        $query = $request->get('q');

        return $searchService->search($query);
    }
}
