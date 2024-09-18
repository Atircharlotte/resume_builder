<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavbarController extends Controller
{
    // for logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
}
