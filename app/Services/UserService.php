<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserService
{


    /**
     * Get Paginate User Data
     */
    public function getPaginate($perPage = 5)
    {
        return User::orderBy('id', 'DESC')->paginate($perPage);
    }

    /**
     * Get All Roles
     */
    public function getRoles()
    {
        return Role::orderBy('name')->get();
    }


    /**
     * Get All Permissions
     */
    public function getPermissions()
    {
        return Permission::orderBy('name')->get();
    }

    /**
     * For Create User With Image
     */
    public function createUser(array $data, ?UploadedFile $image = null): User
    {
        return DB::transaction(function () use ($data, $image) {
            $name = $data['name'];

            $user = User::create([
                'name' => $name,
                'email' => $data['email'],
                'password' => $data['password'],
            ]);

            if ($image) {
                $path = $image->store('users', 'public');

                $user->image()->create([
                    'path' => $path,
                    'disk' => 'public',
                    'alt_text' => $name,
                ]);
            }

            foreach ($data['roles'] as $role) {
                $user->assignRole($role);
            }

            if (!empty($data['permissions'])) {
                $user->syncPermissions($data['permissions']);
            }

            return $user;
        });
    }




    /**
     * For Create User With Image
     */
    public function updateUser(array $data, string $id): User
    {
        return DB::transaction(function () use ($data, $id) {
            $user = User::findOrFail($id);

            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);

            $user->syncRoles($data['roles']);
            $user->syncPermissions($data['permissions'] ?? []);

            return $user;
        });
    }


    /**
     * For Delete User Safely
     */
    public function deleteUser(string $id)
    {
        return DB::transaction(function () use ($id) {
            $user = User::findOrFail($id);

            // 1. Safely remove physical files and database relationships
            if ($user->image) {
                if ($user->image->path) {
                    Storage::disk($user->image->disk ?? 'public')->delete($user->image->path);
                }
                $user->image()->delete();
            }

            $user->roles()->detach();
            $user->permissions()->detach();

            // 3. Delete the user
            $user->delete();
        });
    }
}
