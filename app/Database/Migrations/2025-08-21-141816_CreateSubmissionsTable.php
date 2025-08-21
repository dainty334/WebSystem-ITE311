<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSubmissionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'quiz_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'student_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'answers' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'score' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,
            ],
            'submitted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        // Create table without foreign keys
        $this->forge->createTable('submissions');
    }

    public function down()
    {
        // Simply drop the table, foreign keys handled in separate migration
        try {
            $this->forge->dropTable('submissions');
        } catch (\Exception $e) {
            // Table might not exist
            log_message('error', 'Could not drop submissions table: ' . $e->getMessage());
        }
    }
}