<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions
        Permission::firstOrCreate(['name' => 'view permission']);
        Permission::firstOrCreate(['name' => 'create permission']);
        Permission::firstOrCreate(['name' => 'update permission']);
        Permission::firstOrCreate(['name' => 'delete permission']);

        Permission::firstOrCreate(['name' => 'view role']);
        Permission::firstOrCreate(['name' => 'create role']);
        Permission::firstOrCreate(['name' => 'update role']);
        Permission::firstOrCreate(['name' => 'delete role']);

        Permission::firstOrCreate(['name' => 'view user']);
        Permission::firstOrCreate(['name' => 'create user']);
        Permission::firstOrCreate(['name' => 'update user']);
        Permission::firstOrCreate(['name' => 'delete user']);

        Permission::firstOrCreate(['name' => 'view banner']);
        Permission::firstOrCreate(['name' => 'create banner']);
        Permission::firstOrCreate(['name' => 'update banner']);
        Permission::firstOrCreate(['name' => 'delete banner']);

        Permission::firstOrCreate(['name' => 'view notice']);
        Permission::firstOrCreate(['name' => 'create notice']);
        Permission::firstOrCreate(['name' => 'update notice']);
        Permission::firstOrCreate(['name' => 'delete notice']);

        Permission::firstOrCreate(['name' => 'view gallery']);
        Permission::firstOrCreate(['name' => 'create gallery']);
        Permission::firstOrCreate(['name' => 'update gallery']);
        Permission::firstOrCreate(['name' => 'delete gallery']);

        Permission::firstOrCreate(['name' => 'view page']);
        Permission::firstOrCreate(['name' => 'create page']);
        Permission::firstOrCreate(['name' => 'update page']);
        Permission::firstOrCreate(['name' => 'delete page']);

        Permission::firstOrCreate(['name' => 'view menu']);
        Permission::firstOrCreate(['name' => 'create menu']);
        Permission::firstOrCreate(['name' => 'update menu']);
        Permission::firstOrCreate(['name' => 'delete menu']);

        Permission::firstOrCreate(['name' => 'view menus']);
        Permission::firstOrCreate(['name' => 'create menus']);
        Permission::firstOrCreate(['name' => 'update menus']);
        Permission::firstOrCreate(['name' => 'delete menus']);

        Permission::firstOrCreate(['name' => 'view sector']);
        Permission::firstOrCreate(['name' => 'create sector']);
        Permission::firstOrCreate(['name' => 'update sector']);
        Permission::firstOrCreate(['name' => 'delete sector']);

        Permission::firstOrCreate(['name' => 'view department']);
        Permission::firstOrCreate(['name' => 'create department']);
        Permission::firstOrCreate(['name' => 'update department']);
        Permission::firstOrCreate(['name' => 'delete department']);

        Permission::firstOrCreate(['name' => 'view project']);
        Permission::firstOrCreate(['name' => 'create project']);
        Permission::firstOrCreate(['name' => 'update project']);
        Permission::firstOrCreate(['name' => 'delete project']);

        Permission::firstOrCreate(['name' => 'view district']);
        Permission::firstOrCreate(['name' => 'create district']);
        Permission::firstOrCreate(['name' => 'update district']);
        Permission::firstOrCreate(['name' => 'delete district']);

        Permission::firstOrCreate(['name' => 'view personal-profile']);
        Permission::firstOrCreate(['name' => 'create personal-profile']);
        Permission::firstOrCreate(['name' => 'update personal-profile']);
        Permission::firstOrCreate(['name' => 'delete personal-profile']);

        Permission::firstOrCreate(['name' => 'view document']);
        Permission::firstOrCreate(['name' => 'create document']);
        Permission::firstOrCreate(['name' => 'update document']);
        Permission::firstOrCreate(['name' => 'delete document']);

        Permission::firstOrCreate(['name' => 'view repository']);
        Permission::firstOrCreate(['name' => 'create repository']);
        Permission::firstOrCreate(['name' => 'update repository']);
        Permission::firstOrCreate(['name' => 'delete repository']);

        Permission::firstOrCreate(['name' => 'view article']);
        Permission::firstOrCreate(['name' => 'create article']);
        Permission::firstOrCreate(['name' => 'update article']);
        Permission::firstOrCreate(['name' => 'delete article']);

        Permission::firstOrCreate(['name' => 'view department-website']);
        Permission::firstOrCreate(['name' => 'create department-website']);
        Permission::firstOrCreate(['name' => 'update department-website']);
        Permission::firstOrCreate(['name' => 'delete department-website']);

        Permission::firstOrCreate(['name' => 'view video-gallery']);
        Permission::firstOrCreate(['name' => 'create video-gallery']);
        Permission::firstOrCreate(['name' => 'update video-gallery']);
        Permission::firstOrCreate(['name' => 'delete video-gallery']);

        Permission::firstOrCreate(['name' => 'view settings']);
        Permission::firstOrCreate(['name' => 'update settings']);
        
        // Create Role (Super Admin)
        $admin = Role::firstOrCreate(['name' => 'Super Admin']);
        $admin->syncPermissions(Permission::all());

        // Assign Role to User
        $user = User::find(1);
        $user->syncRoles($admin);
    }
}
