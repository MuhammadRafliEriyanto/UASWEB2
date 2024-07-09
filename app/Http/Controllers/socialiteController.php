<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $existingUser = User::where('email', $user->getEmail())->first();

            if ($existingUser) {
                Auth::login($existingUser);
                return redirect()->route('user.dashboard');
            } else {
                // Create a new user if not exists
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make(Str::random(60)), // Temporary password
                    'email_verified_at' => now(),
                    'role' => 'user',
                ]);

                Auth::login($newUser);
                return redirect()->route('user.dashboard');
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Login via Google gagal. Silakan coba lagi.');
        }
    }
}
