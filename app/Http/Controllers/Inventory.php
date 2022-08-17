<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Inventory extends Controller
{
    public function view()
    {
        return view('inventory', [
            'data' => \App\Models\Inventory::query()->get('*'),
            'cat' => \App\Models\Category::query()->get('*')
        ]);
    }

    public function new()
    {
        return view('newinventory', [
            'categories' => \App\Models\Category::query()->select('category', 'id')->get()
        ]);
    }

    public function create(Request $request)
    {
        \App\Models\Inventory::query()->create(
            [
                'name' => $request->input('item-name'),
                'description' => $request->input('description'),
                'quantity' => $request->input('quantity'),
                'category_id' => $request->input('category'),
                'image_url' => $request->input('image'),
                'collect_location' => $request->input('collection')
            ]
        );

//        Session::flash('status', 'success');

        return redirect(route('inventory.manage'));
    }

    public function manage()
    {
        return view('allinventory', [
            'data' => \App\Models\Inventory::query()->orderByDesc('name')->paginate(15),
        ]);
    }
}
