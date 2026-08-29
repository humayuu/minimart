<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view brand',
            'create brand',
            'edit brand',
            'update brand',
            'delete brand',
            'view detail brand',

            'view category',
            'create category',
            'edit category',
            'update category',
            'delete category',
            'view detail category',

            'view product',
            'create product',
            'edit product',
            'update product',
            'delete product',
            'view detail product',

            'view order',
            'create order',
            'edit order',
            'update order',
            'delete order',
            'view detail order',

            'view user',
            'create user',
            'edit user',
            'update user',
            'delete user',
            'view detail user',


            'view setting',
            'create setting',
            'edit setting',
            'update setting',
            'delete setting',
            'view detail setting',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }
    }
}
