<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Users extends Controller
{
    public function view()
    {
        return view('users', [
            'data' => User::query()->paginate(15)
        ]);
    }
}
