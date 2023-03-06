<?php

namespace Database\Seeders;

use App\Services\Constant;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Constant::getRoles() as $role) {
            if (!Role::whereName($role)->first()) {
                Role::create([
                    'name' => $role
                ]);
            }
        }
    }
}
