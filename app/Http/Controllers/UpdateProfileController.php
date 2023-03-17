<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    public function edit()
    {
        return view('users.edit');
    }

    public function update(Request $request)
    {
        $update = $request->validate([
            'name' => ['required','min:3','max:191','string'],
            'email' => ['required','email','string','min:3','max:191'],
            'username' => ['required','alpha_num','unique:users,username,'.Auth()->id()],
        ]);

        Auth()->user()->update($update);
        
        //     [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'username' => $request->username
        // ])

        return back()->with('message', 'Your Profile Has Been Updated');
    }
}
