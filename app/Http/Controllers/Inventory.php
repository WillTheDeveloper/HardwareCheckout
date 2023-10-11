<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Inventory extends Controller
{
    public function view()
    {
        return view('inventory', [
            'inventory' => \App\Models\Inventory::query()->orderBy('name', 'asc')->paginate(20)
        ]);
    }

    public function search(Request $request)
    {
        return view('inventorysearch', [
            'results' => \App\Models\Inventory::search($request->input('search'))->get()
        ]);
    }

    public function new()
    {
        return view('newinventory', [
            'categories' => \App\Models\Category::query()->select('category', 'id')->get()
        ]);
    }

    public function users($id)
    {
        return view('itemusers', [
            'item' => \App\Models\Inventory::query()->findOrFail($id),
            'users' => \App\Models\Inventory::query()->select('user_id')
        ]);
    }

    public function history($id)
    {
        return view('itemhistory', [
            'item' => \App\Models\Inventory::query()->findOrFail($id),
            'data' => \App\Models\Request::query()
                ->where('inventory_id', $id)
                ->where('status', 'RETURNED')
                ->orderByDesc('created_at')
                ->paginate(10),
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

        //Session::flash('create', 'success');

        return redirect(route('inventory.manage'));
    }

    public function management($id)
    {
        $current = \App\Models\Inventory::query()->find($id)->category_id;
        return view(
            'manageitem',
            [
                'item' => \App\Models\Inventory::query()->findOrFail($id),
                'categories' => \App\Models\Category::query()->get()
            ]
        );
    }

    public function manage()
    {
        return view('allinventory', [
            'data' => \App\Models\Inventory::query()->orderByDesc('name')->paginate(15),
        ]);
    }

    public function update($id, Request $request)
    {
        \App\Models\Inventory::find($id)->update(
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'image_url' => $request->input('image'),
                'collect_location' => $request->input('collection'),
                'category_id' => $request->input('category'),
                'quantity' => $request->input('quantity')
            ]
        );

        Session::flash('success');

        return redirect(route('inventory.manage-id', $id));
    }
}
