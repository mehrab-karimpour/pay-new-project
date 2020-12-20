<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class authController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function newRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'lastName' => 'required|string',
            'nationalCode' => 'numeric|numeric',
            'birthDate' => 'required',
            'mobile' => 'required',
            'password' => 'required',
        ]);

        try {

            $user = User::create([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'nationalCode' => $request->nationalCode,
                'birthDate' => $request->nationalCode,
                'mobile' => $request->nationalCode,
                'password' => Hash::make($request->nationalCode),
            ]);
            $user->assignRole('user');
            return back()->with('register-status', 'success');

        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('register-status', 'error');
        }
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = [
            'nationalCode' => $request->nationalCode,
            'password' => $request->password
        ];
        if (Auth::attempt($data)) {
            return "ok";
        }
        return "error";
    }

}







