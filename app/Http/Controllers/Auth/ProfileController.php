<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PasswordUpdateRequest;
use App\Http\Requests\Auth\ProfileUpdateRequest;
use App\Services\Auth\ProfileService;

class ProfileController extends Controller
{
    public function __construct(private ProfileService $profileService) {}
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

    /**
     * For Update Profile info
     */
    public function profileUpdate(ProfileUpdateRequest $request, string $id)
    {
        $this->profileService->userUpdate($id, $request->validated());
        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }

    /**
     * For Update Password
     */
    public function passwordUpdate(PasswordUpdateRequest $request, string $id)
    {
        $this->profileService->userPasswordUpdate($id, $request->validated());
        return redirect()->back()->with('success', 'Password Updated Successfully');
    }
}
