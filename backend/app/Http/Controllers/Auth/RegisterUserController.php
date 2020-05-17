<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request['name'],
            'country' => $request['country'],
            'email' => $request['email'],
            'email_verification_code' => md5(rand(0, 6)),
            'password' => Hash::make($request['password']),
        ]);

        if ($user) {
            Mail::send(new VerifyEmail($user));

            return response()->json(['data' => [
                'success' => true,
            ]]);
        } else {
            return response()->json(['errors' => [
                'root' => 'Cannot create user.'
            ]]);
        }
    }

    public function verify(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'token' => 'required'
        ]);

        $user = User::find($request->id);
        if ($user && $request->token == $user->email_verification_code) {
            $user->email_verified_at = now();
            $user->email_verification_code = md5(rand(0, 6));

            $user->save();

            return response()->json(['data' => [
                'success' => true
            ]]);
        }
    }
}
