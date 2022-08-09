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
}
