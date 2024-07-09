<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class akuncontroller extends Controller
{
    //

    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        $users = User::where('role', 'user')->get();
        return view('admin.akun', compact('admins', 'users'));
    }
}