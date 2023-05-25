<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register_page()
    {
        return view('user/registration');
    }

    public function registration()
    {
        
    }
}
