<?php

// app/Http/Controllers/LoginController.php
namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function forgot_password()
    {
        return view('auth.forgot-password');
    }

    public function forgot_password_act(Request $request)
{
    $customMessage = [
        'email.required'    => 'Email tidak boleh kosong',
        'email.email'       => 'Email tidak valid',
        'email.exists'      => 'Email tidak terdaftar di database',
    ];

    $request->validate([
        'email' => 'required|email|exists:users,email'
    ], $customMessage);

    $token = \Str::random(60);

    PasswordResetToken::updateOrCreate(
        [
            'email' => $request->email
        ],
        [
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]
    );

    $email = $request->email;

    Mail::to($request->email)->send(new ResetPasswordMail($token, $email));

    return redirect()->route('forgot-password')->with('success', 'Kami telah mengirimkan link reset password ke email anda');
}

public function validasi_forgot_password(Request $request, $token, $email)
{
    $getToken = PasswordResetToken::where('token', $token)->where('email', $email)->first();

    if (!$getToken) {
        return redirect()->route('login')->with('failed', 'Token tidak valid');
    }
    return view('auth.validasi-token', compact('token', 'email'));
}

public function validasi_forgot_password_act(Request $request, $email)
{
    $customMessage = [
        'password.required' => 'Password tidak boleh kosong',
        'password.min'      => 'Password minimal 6 karakter',
    ];

    $request->validate([
        'password' => 'required|min:6'
    ], $customMessage);

    $token = PasswordResetToken::where('token', $request->token)->first();

    if (!$token) {
        return redirect()->route('login')->with('failed', 'Token tidak valid');
    }

    $user = User::where('email', $email)->first();

    if (!$user) {
        return redirect()->route('login')->with('failed', 'Email tidak terdaftar di database');
    }

    $user->update([
        'password' => Hash::make($request->password)
    ]);

    $token->delete();

    return redirect()->route('login')->with('success', 'Password berhasil direset');
}

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'user') {
                return redirect()->route('user.dashboard');
            }
        }

        return redirect()->route('login')->withErrors('Login details are not valid');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'nama'  => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $data['name']       = $request->nama;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);

        User::create($data);

        $login = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if (Auth::attempt($login)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }
    }
}



