<?php

// Fix for migrations with foreign key issues
// This script will:
// 1. Rollback all migrations
// 2. Run migrations one by one in the correct order

// Load the CodeIgniter bootstrap
require FCPATH . '../vendor/autoload.php';
require FCPATH . '../system/bootstrap.php';

// Get a reference to the Services class
$services = \Config\Services::class;

// Get database connection and migration runner
$db = \Config\Database::connect();
$migration = \Config\Services::migrations();

echo "Starting migration fix...\n";

// Step 1: Roll back all migrations
try {
    echo "Rolling back all migrations...\n";
    $migration->regress(0);
    echo "All migrations rolled back successfully.\n";
} catch (\Exception $e) {
    echo "Error rolling back migrations: " . $e->getMessage() . "\n";
    // Continue anyway
}

// Step 2: Run migrations in the correct order
echo "Running migrations in order...\n";

// Run the users migration first
try {
    echo "Migrating users table...\n";
    $migration->force('App\Database\Migrations\CreateUsersTable', 'up');
    echo "Users table created successfully.\n";
} catch (\Exception $e) {
    echo "Error creating users table: " . $e->getMessage() . "\n";
}

// Run the courses migration
try {
    echo "Migrating courses table...\n";
    $migration->force('App\Database\Migrations\CreateCoursesTable', 'up');
    echo "Courses table created successfully.\n";
} catch (\Exception $e) {
    echo "Error creating courses table: " . $e->getMessage() . "\n";
}

// Run the lessons migration
try {
    echo "Migrating lessons table...\n";
    $migration->force('App\Database\Migrations\CreateLessonsTable', 'up');
    echo "Lessons table created successfully.\n";
} catch (\Exception $e) {
    echo "Error creating lessons table: " . $e->getMessage() . "\n";
}

// Run the enrollments migration
try {
    echo "Migrating enrollments table...\n";
    $migration->force('App\Database\Migrations\CreateEnrollmentsTable', 'up');
    echo "Enrollments table created successfully.\n";
} catch (\Exception $e) {
    echo "Error creating enrollments table: " . $e->getMessage() . "\n";
}

// Run the quizzes migration
try {
    echo "Migrating quizzes table...\n";
    $migration->force('App\Database\Migrations\CreateQuizzesTable', 'up');
    echo "Quizzes table created successfully.\n";
} catch (\Exception $e) {
    echo "Error creating quizzes table: " . $e->getMessage() . "\n";
}

// Run the submissions migration last
try {
    echo "Migrating submissions table...\n";
    $migration->force('App\Database\Migrations\CreateSubmissionsTable', 'up');
    echo "Submissions table created successfully.\n";
} catch (\Exception $e) {
    echo "Error creating submissions table: " . $e->getMessage() . "\n";
}

echo "Migration fix completed.\n";
