<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PosSeeder extends Seeder
{
    public function run()
    {
        $createdAt = date('Y-m-d H:i:s');
        $password = password_hash('pos12345', PASSWORD_DEFAULT);

        if ($this->db->table('customers')->countAllResults() === 0) {
            $this->db->table('customers')->insertBatch([
                ['full_name' => 'Andrea Santos', 'email' => 'andrea.santos@example.com', 'phone' => '0917 482 1103', 'created_at' => $createdAt],
                ['full_name' => 'Miguel Reyes', 'email' => 'miguel.reyes@example.com', 'phone' => '0918 735 2246', 'created_at' => $createdAt],
                ['full_name' => 'Sofia Lim', 'email' => 'sofia.lim@example.com', 'phone' => '0920 614 3891', 'created_at' => $createdAt],
                ['full_name' => 'Paolo Garcia', 'email' => 'paolo.garcia@example.com', 'phone' => '0921 847 5062', 'created_at' => $createdAt],
                ['full_name' => 'Camille Dela Cruz', 'email' => 'camille.delacruz@example.com', 'phone' => '0927 330 7485', 'created_at' => $createdAt],
                ['full_name' => 'Noah Mendoza', 'email' => 'noah.mendoza@example.com', 'phone' => '0935 912 6614', 'created_at' => $createdAt],
            ]);
        }

        if ($this->db->table('users')->countAllResults() === 0) {
            $this->db->table('users')->insertBatch([
                ['username' => 'admin.mara', 'full_name' => 'Mara Villanueva', 'avatar' => null, 'password' => $password, 'created_at' => $createdAt],
                ['username' => 'cashier.jules', 'full_name' => 'Jules Navarro', 'avatar' => null, 'password' => $password, 'created_at' => $createdAt],
                ['username' => 'cashier.ren', 'full_name' => 'Ren Castillo', 'avatar' => null, 'password' => $password, 'created_at' => $createdAt],
                ['username' => 'inventory.ana', 'full_name' => 'Ana Flores', 'avatar' => null, 'password' => $password, 'created_at' => $createdAt],
                ['username' => 'manager.eli', 'full_name' => 'Elijah Ramos', 'avatar' => null, 'password' => $password, 'created_at' => $createdAt],
                ['username' => 'support.kim', 'full_name' => 'Kim Bautista', 'avatar' => null, 'password' => $password, 'created_at' => $createdAt],
            ]);
        }
    }
}
