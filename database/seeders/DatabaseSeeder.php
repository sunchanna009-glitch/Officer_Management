<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Department;
use App\Models\Officer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'System Admin', 'password' => Hash::make('password')]
        );

        $police = Department::firstOrCreate(
            ['department_name' => 'Police Department'],
            ['location' => 'Phnom Penh', 'description' => 'General police operations']
        );

        $traffic = Department::firstOrCreate(
            ['department_name' => 'Traffic Department'],
            ['location' => 'Phnom Penh', 'description' => 'Traffic management']
        );

        Officer::firstOrCreate(
            ['badge_number' => 'OFF-001'],
            [
                'name' => 'Dara Sok',
                'gender' => 'Male',
                'dob' => '1995-04-12',
                'rank' => 'Sergeant',
                'phone' => '012345678',
                'email' => 'dara@example.com',
                'address' => 'Phnom Penh',
                'description' => 'Sample officer record',
                'department_id' => $police->id,
            ]
        );

        Officer::firstOrCreate(
            ['badge_number' => 'OFF-002'],
            [
                'name' => 'Sophea Chan',
                'gender' => 'Female',
                'dob' => '1997-08-20',
                'rank' => 'Lieutenant',
                'phone' => '098765432',
                'email' => 'sophea@example.com',
                'address' => 'Phnom Penh',
                'description' => 'Sample officer record',
                'department_id' => $traffic->id,
            ]
        );
    }
}
