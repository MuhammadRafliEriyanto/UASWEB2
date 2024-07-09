<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userhomeController extends Controller
{
    //
    public function index(){
        return view('user.dashboard');
    }
}
