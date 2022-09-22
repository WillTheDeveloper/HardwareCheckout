<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Users extends Controller
{
    public function view()
    {
        return view('users', [
            'data' => User::query()->orderBy('name')->paginate(25)
        ]);
    }

    public function details($id)
    {
        return view('userdetails', [
            'data' => User::query()->findOrFail($id)
        ]);
    }

    public function makeAdmin($id)
    {
        User::query()->findOrFail($id)->update(
            [
                'is_admin' => true
            ]
        );

        return redirect(route('users.details', $id));
    }

    public function removeAdmin($id)
    {
        User::query()->findOrFail($id)->update(
            [
                'is_admin' => false
            ]
        );

        return redirect(route('users.details', $id));
    }
}
