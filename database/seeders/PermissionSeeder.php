<?php

namespace Database\Seeders;

use App\Services\Constant;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $permissions = Constant::getPermissions()['permissions'];
        $assignments = Constant::getPermissions()['assignments'];

        // get all permissions
        $savedPermissions = Permission::all();

        // remove un-exist permission
        foreach ($savedPermissions as $permission) {
            if (!in_array($permission->name, Arr::flatten($permissions))) $permission->delete();
        }

        // seed permissions
        foreach ($permissions as $permission) {
            foreach ($permission as $item) {
                if (!$savedPermissions->where('name', $item)->first()) {
                    Permission::create([
                        'name' => $item
                    ]);
                }
            }
        }

        // assignment
        foreach ($assignments as $role => $assignment) {
            $r = Role::whereName($role)->first();
            $r->givePermissionTo($assignment);
        }
    }
}
