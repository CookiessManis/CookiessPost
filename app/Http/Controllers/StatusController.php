<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function store(StatusRequest $request)
    {
        // $request->validate([
        //     'body' => 'required'
        // ]);

        Auth::user()->statuses()->create([
            'body' => $request->body,
            'identifier' => Str::slug(Str::random(31).Auth::user()->id)
        ]);
        return redirect()->back();

        // Auth::user()->makeStatus($request->body);
        // return redirect()->back();
    }
}
