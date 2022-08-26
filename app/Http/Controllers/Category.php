<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Category extends Controller
{
    public function all()
    {
        return view('categories', [
            'data' => \App\Models\Category::query()->orderByDesc('category')->get()
        ]);
    }

    public function edit($id)
    {
        return view('editcatagory', [
            'data' => \App\Models\Category::query()->findOrFail($id),
            'items' => \App\Models\Inventory::query()->where('category_id', $id)->get()
        ]);
    }

    public function new()
    {
        return view('newcategory');
    }

    public function create(Request $request)
    {
        $c = \App\Models\Category::query()->create(
            [
                'category' => $request->input('category')
            ]
        );

        return redirect(route('category.all'));
    }

    public function view($id) // Not sure why I have this, might delete later //
    {
        return view('category', [
            'data' => \App\Models\Category::query()->findOrFail($id)
        ]);
    }
}
