<?php

namespace App\Http\Controllers;

use App\Enums\Period;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        return Video::WithRelationships(request('with'))
            ->fromPeriod(Period::tryFrom(request('period')))
            ->search(request('query'))
            ->orderBy(request('sort', 'created_at'), request('order', 'desc'))
            ->simplePaginate(request('limit'))
            ->withQueryString();

    }

    public function show(Video $video)
    {
        return $video->loadRelationships(request('with'));
    }
    public function playlists()
    {
        return $this->hasMany(Video::class);
    }
}
