<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaymentTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'id_payment' => [
                'type' => 'VARCHAR',
                'constraint' => 255,

            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'payment_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'payment_bank' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'payment_va' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'coupon' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'course_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'amount' => [
                'type' => 'DOUBLE',
            ],
            'create_at' => [
                'type' => 'INT',
            ],
            'update_at' => [
                'type' => 'INT',
            ],
            'admin_revenue' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'instructor_revenue' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'instructor_payment_status' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'code_trans' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status_payment' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'status' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_user', 'users', 'id');
        $this->forge->createTable('payment');
    }

    public function down()
    {
        $this->forge->dropTable('payment', true);
    }
}
