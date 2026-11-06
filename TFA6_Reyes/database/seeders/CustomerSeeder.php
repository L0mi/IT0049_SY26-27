<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            [
                'full_name' => 'Lamuel Christopher Reyes',
                'email' => 'loreyes@feudiliman.edu.ph',
                'phone' => '09xxxxxxxx',
                'address' => 'Quezon City',
            ],
            [
                'full_name' => 'Maria DB',
                'email' => 'oracle@example.com',
                'phone' => '09181234567',
                'address' => 'Manila',
            ],
            [
                'full_name' => 'Sam Perez',
                'email' => 'xampp@example.com',
                'phone' => '09191234567',
                'address' => 'Makati City',
            ],
            [
                'full_name' => 'Kai Sotto',
                'email' => 'gulay@example.com',
                'phone' => '09201234567',
                'address' => 'Pasig City',
            ],
            [
                'full_name' => 'Mark Mendoza',
                'email' => 'mark@example.com',
                'phone' => '09211234567',
                'address' => 'Taguig City',
            ],
        ];

        foreach ($customers as $index => $customer) {
            Customer::updateOrCreate(
                ['id' => $index + 1],
                $customer,
            );
        }
    }
}
