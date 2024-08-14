<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Jobs\AlertLoginJob;

class LoginController
{
    public function store(LoginRequest $loginRequest){
        AlertLoginJob::dispatch(['name'=>$loginRequest->name]);
        $loginRequest->authenticate();
        $loginRequest->session()->regenerate();
       
        return redirect()->route('mails.index');
    }
}
