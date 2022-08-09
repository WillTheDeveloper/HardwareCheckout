<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Requests extends Controller
{
    public function view()
    {
        return view('requests');
    }
}
