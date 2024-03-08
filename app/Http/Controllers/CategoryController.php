<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {

        return Category::withRelationships(request('with', []))

            ->search(request('query'))
            ->orderBy(request('sort', 'created_at'), request('order', 'asc'))
            ->simplePaginate(request('limit'))
            ->withQueryString();
    }

    public function show(Category $category)
    {
        return $category->load(request('with', []));
    }
}
