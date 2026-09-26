<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AppSeeder extends Seeder
{
    public function run()
    {
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        $createdAt = date('Y-m-d H:i:s');

        $this->db->table('tasks')->insertBatch([
            ['title' => 'Review project requirements', 'status' => 'completed', 'task_date' => $yesterday, 'created_at' => $createdAt],
            ['title' => 'Prepare database tables', 'status' => 'completed', 'task_date' => $yesterday, 'created_at' => $createdAt],
            ['title' => 'Check today\'s priorities', 'status' => 'pending', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Update task progress', 'status' => 'in progress', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Test all application pages', 'status' => 'pending', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Send daily status report', 'status' => 'pending', 'task_date' => $today, 'created_at' => $createdAt],
            ['title' => 'Plan next development step', 'status' => 'pending', 'task_date' => $tomorrow, 'created_at' => $createdAt],
            ['title' => 'Organize project documentation', 'status' => 'pending', 'task_date' => $tomorrow, 'created_at' => $createdAt],
        ]);

        $this->db->table('users')->insert([
            'username'   => 'lamuelreyes',
            'full_name'  => 'Lamuel Christopher Reyes',
            'email'      => 'loreyesfeudilamn.edu.ph',
            'created_at' => $createdAt,
        ]);
    }
}
