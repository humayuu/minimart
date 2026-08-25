<?php

namespace App\Services\Auth;

use App\Models\User;

class ProfileService
{


    public function userUpdate(string $id, array $data)
    {
        $user = User::findOrFail($id);
        return $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
    }


    public function userPasswordUpdate(string $id, array $data)
    {
        $user = User::findOrFail($id);
        return $user->update([
            'password' => $data['password'],
        ]);
    }
}
