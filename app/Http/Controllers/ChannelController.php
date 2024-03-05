<?php

namespace App\Http\Controllers;

use App\Enums\Period;
use App\Models\Channel;

class ChannelController extends Controller
{
    public function index()
    {
        
        return Channel::with(request('with', []))
            
            ->search(request('query'))
            ->orderBy(request('sort', 'created_at'), request('order', 'asc'))
            ->simplePaginate(request('limit'))
            ->withQueryString();
    }

    public function show(Channel $channel)
    {
        return $channel->load(request('with', []));;
    }
}
