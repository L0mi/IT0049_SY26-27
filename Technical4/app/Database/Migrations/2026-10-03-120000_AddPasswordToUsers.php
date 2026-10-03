<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPasswordToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'avatar',
            ],
        ]);

        foreach ($this->db->table('users')->select('id')->get()->getResultArray() as $user) {
            $this->db->table('users')->where('id', $user['id'])->update([
                'password' => password_hash('pos12345', PASSWORD_DEFAULT),
            ]);
        }

        $this->forge->modifyColumn('users', [
            'password' => [
                'name' => 'password',
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'password');
    }
}
