<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Requests extends Controller
{
    public function view()
    {
        return view('requests', [
            'data' => \App\Models\Request::query()
                ->where('user_id', auth()->id())
                ->paginate(10)
        ]);
    }

    public function make($id)
    {
        \App\Models\Request::query()->firstOrCreate(
            [
                'user_id' => auth()->id(),
                'inventory_id' => $id,
                'quantity' => 1,
                'note' => null,
                'status' => "PENDING"
            ]
        );
        return redirect(route('requests'));
    }
}
