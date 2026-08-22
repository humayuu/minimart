<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Http\Requests\Auth\UserSignupRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(private AuthService $authService) {}
    /**
     * For Register
     */
    public function signup(UserSignupRequest $request)
    {
        if ($user = $this->authService->userRegister($request->validated())) {
            Auth::login($user);
        }

        return redirect()->route('home')->with('success', 'User Signup Successfully');
    }


    /**
     * For Login
     */
    public function login(UserLoginRequest $request)
    {
        try {
            $user = $this->authService->userLogin($request->validated());
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }

        return redirect()->route('home')->with('success', 'Logged in successfully');
    }


    /**
     * For Logout
     */
    public function logout(Request $request)
    {
        $this->authService->userLogout($request);

        return redirect()->route('user.login')->with('success', 'User Logout Successfully');
    }
}