<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UpdatePasswordController extends Controller
{
    public function edit()
    {
        return view('password.edit');
    }

    public function update(Request $request)
    {

        // melakukan validate
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required','min:8','confirmed']
        ]);

        // melakukan check pada current password dan melakukan query pada password setelah itu meredirect ke halaman back

        if(Hash::check($request->current_password,auth()->user()->password)){
            auth()->user()->update([
                'password' => Hash::make($request->password)
            ]);
            return back()->with('message','Your Password Has Been Update');
        }

        // validate pada current password
        throw ValidationException::withMessages([
            'current_password' => 'Your current password does not match with our recored'
        ]);
    }
}
