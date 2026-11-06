<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin01',
                'full_name' => 'Lamuel Christopher Reyes',
                'email' => 'loreyes@feudiliman.edu.ph',
                'role' => 'Administrator',
                'status' => 'Active',
            ],
            [
                'username' => 'staff01',
                'full_name' => 'Maria DB',
                'email' => 'oracle@example.com',
                'role' => 'Cashier',
                'status' => 'Active',
            ],
            [
                'username' => 'staff02',
                'full_name' => 'Sam Perez',
                'email' => 'xampp@example.com',
                'role' => 'Cashier',
                'status' => 'Active',
            ],
            [
                'username' => 'cashier01',
                'full_name' => 'Kai Sotto',
                'email' => 'gulay@example.com',
                'role' => 'Inventory Staff',
                'status' => 'Inactive',
            ],
            [
                'username' => 'cashier02',
                'full_name' => 'Mark Mendoza',
                'email' => 'mark@example.com',
                'role' => 'Manager',
                'status' => 'Active',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['username' => $user['username']],
                $user,
            );
        }
    }
}
