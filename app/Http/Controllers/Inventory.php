<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Inventory extends Controller
{
    public function view()
    {
        return view('inventory', [
            'data' => \App\Models\Inventory::query()->get('*'),
            'cat' => \App\Models\Category::query()->get('*')
        ]);
    }

    public function manage()
    {
        return view('allinventory');
    }
}
