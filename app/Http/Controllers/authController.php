<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class authController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function newRegister(Request $request)
    {
        unset($request['_token']);
        User::create($request->all());
    }

}
