<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQuizzesTable extends Migration
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
            'lesson_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'instructions' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'time_limit' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'comment' => 'Time limit in minutes',
            ],
            'max_attempts' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 1,
            ],
            'passing_score' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'default' => 60.00,
                'comment' => 'Minimum percentage to pass',
            ],
            'total_questions' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'is_active' => [
                'type' => 'BOOLEAN',
                'default' => true,
            ],
            'is_randomized' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'comment' => 'Randomize question order',
            ],
            'show_results' => [
                'type' => 'BOOLEAN',
                'default' => true,
                'comment' => 'Show results after completion',
            ],
            'available_from' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'available_until' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addKey('lesson_id');
        $this->forge->createTable('quizzes');
    }

    public function down()
    {
        // Use try-catch to avoid errors if table doesn't exist
        try {
            $this->forge->dropTable('quizzes');
        } catch (\Exception $e) {
            // Table doesn't exist, just continue
        }
    }
}