<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;


class ChannelController extends Controller
{
    public function index()
    {
        return Channel::with('videos')->get();
    }

    public function show(Channel $channel)
    {
        return $channel->load('videos');
    }
}
