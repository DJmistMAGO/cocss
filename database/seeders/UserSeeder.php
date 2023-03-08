<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('sorsu_email', 'nurse@sorsu.edu.ph')->first()) {
            $user = User::create([
                'name' => 'Sorsu Bulan Nurse',
                'user_name' => 'nurse_Sorsu',
                'school_id' => '123-456',
                'sorsu_email' => 'nurse@sorsu.edu.ph',
                'bdate' => '1999-12-15',
                'phone_no' => '09123456789',
                'password' => Hash::make('sorsu_nurse123')
            ]);
            $user->assignRole('admin');
        }


        if (!User::where('sorsu_email', 'juan@sorsu.edu.ph')->first()) {
            $user = User::create([
                'name' => 'Juan De la Cruz',
                'user_name' => 'juansorsu',
                'school_id' => '18-6788',
                'sorsu_email' => 'juan@sorsu.edu.ph',
                'bdate' => '1999-12-15',
                'phone_no' => '09123456745',
                'password' => Hash::make('12341234')
            ]);
            $user->assignRole('user');
        }
    }
}
