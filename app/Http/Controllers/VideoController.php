<?php

namespace App\Http\Controllers;

use App\Enums\Period;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $period = Period::tryFrom(request('period'));

        return Video::with(request('with', []))
            ->fromPeriod($period)
            ->search(request('query'))
            ->limit(request('limit'))
            ->orderBy(request('sort', 'created_at'), request('order', 'asc'))
            ->get();

<<<<<<< HEAD
=======


>>>>>>> 0ba6005df13516ef5d561bc4492f5053826ef194
    }

    public function show(Video $video)
    {
        return $video->load(request('with', []));
    }
}
