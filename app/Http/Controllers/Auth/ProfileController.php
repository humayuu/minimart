<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * redirect to profile Update Page
     */
    public function profilePage()
    {
        return view('profile');
    }

    /**
     * redirect to Update Password Page
     */
    public function UpdatePasswordPage()
    {
        return view('change-password');
    }
}