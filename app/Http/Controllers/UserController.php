<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {

        return User::withRelationships(request('with'))

            ->search(request('query'))
            ->orderBy(request('sort', 'created_at'), request('order', 'asc'))
            ->simplePaginate(request('limit'))
            ->withQueryString();
    }

    public function show(User $user)
    {
        return $user->loadRelationships(request('with'));
    }
}
