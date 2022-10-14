<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function view()
    {
        return view('dashboard', [
            'requests' => \App\Models\Request::query()
                ->where('user_id', auth()->id())
                ->where('status', strtoupper('active'))
                ->paginate(20)
        ]);
    }
}
