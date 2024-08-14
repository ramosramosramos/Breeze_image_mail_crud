<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Jobs\WelcomeJob;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegisterController
{
    public function store(RegisterRequest $request)
     {
       
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);    
        WelcomeJob::dispatch($user);
   
        Auth::login($user);
        return  redirect()->route('mails.index');
     }
}
