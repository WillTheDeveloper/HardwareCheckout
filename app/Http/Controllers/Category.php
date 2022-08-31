<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function deleteAllAssociated($id)
    {
        \App\Models\Inventory::query()
            ->where('category_id', $id)
            ->select('id')
            ->delete();

        $inv = \App\Models\Inventory::query()
            ->where('category_id', $id)
            ->select('id');

        \App\Models\Request::query()
            ->where('user_id', auth()->id())
            ->where('inventory_id', $inv)->delete();

        return redirect(route('category.view', $id));
    }

    public function reassignview($id)
    {
        return view('reassignitem', [
            'categories' => \App\Models\Category::query()->get()->except($id),
            'current' => \App\Models\Category::query()->findOrFail($id)
        ]);
    }

    public function reassignaction($id, Request $request)
    {
        $new = $request->input('category');

        \App\Models\Inventory::query()
            ->where('category_id', $id)
            ->update([
                'category_id' => $new
            ]);

        Session::flash('success');

        return redirect(route('category.view', $new));
    }

    public function deleteCategory($id)
    {
        \App\Models\Category::query()->findOrFail($id)->delete();

        return redirect(route('category.all'));
    }

    public function update($id, Request $request)
    {
        \App\Models\Category::query()->find($id)->update([
            'category' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        Session::flash('success');

        return redirect(route('category.view', $id));
    }
}
