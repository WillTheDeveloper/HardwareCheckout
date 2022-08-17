<?php

namespace App\Http\Controllers;

use App\Mail\RequestApproved;
use App\Mail\RequestLate;
use App\Mail\RequestMade;
use App\Mail\RequestRejected;
use App\Mail\RequestReturned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Requests extends Controller
{
    public function view()
    {
        return view('requests', [
            'data' => \App\Models\Request::query()
                ->where('user_id', auth()->id())
                ->orderByDesc('created_at')
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

        $req = \App\Models\Request::query()->findOrFail($id);

        Mail::to($req->User->email)->send(new RequestMade($req->get()));

        return redirect(route('requests'));
    }

    public function manage()
    {
        return view('allrequests', [
            'active' => \App\Models\Request::query()->where('status', 'ACTIVE')->orderByDesc('created_at')->get('*'),
            'pending' => \App\Models\Request::query()->where('status', 'PENDING')->orderByDesc('created_at')->get('*'),
            'late' => \App\Models\Request::query()->where('status', 'LATE')->orderByDesc('created_at')->get('*'),
            'accepted' => \App\Models\Request::query()->where('status', 'ACCEPTED')->orderByDesc('created_at')->get('*')
        ]);
    }

    public function approve($id)
    {
        $r = \App\Models\Request::query()->findOrFail($id)
            ->update(
                [
                    'status' => 'ACCEPTED'
                ]
            );

        $req = \App\Models\Request::query()->findOrFail($id);

        Mail::to($req->User->email)->send(new RequestApproved($req->get()));

        return redirect(route('requests.manage'));
    }

    public function reject($id)
    {
        $r = \App\Models\Request::query()->findOrFail($id)
            ->update(
                [
                    'status' => 'DECLINED'
                ]
            );

        $req = \App\Models\Request::query()->findOrFail($id);

        Mail::to($req->User->email)->send(new RequestRejected($req->get()));

        return redirect(route('requests.manage'));
    }

    public function active($id)
    {
        $r = \App\Models\Request::query()->findOrFail($id)
            ->update(
                [
                    'status' => 'ACTIVE'
                ]
            );
        return redirect(route('requests.manage'));
    }

    public function late($id)
    {
        $r = \App\Models\Request::query()->findOrFail($id)
            ->update(
                [
                    'status' => 'LATE'
                ]
            );

        $req = \App\Models\Request::query()->findOrFail($id);

        Mail::to($req->User->email)->send(new RequestLate($req->get()));

        return redirect(route('requests.manage'));
    }

    public function returned($id)
    {
        $r = \App\Models\Request::query()->findOrFail($id)
            ->update(
                [
                    'status' => 'RETURNED'
                ]
            );

        $req = \App\Models\Request::query()->findOrFail($id);

        Mail::to($req->User->email)->send(new RequestReturned($req->get()));

        return redirect(route('requests.manage'));
    }
}
