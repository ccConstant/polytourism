<?php

/*
* Filename: 2019_08_19_000000_create_failed_jobs_table.php
* Creation date: 
* Update date:  
* This migration file is designed to work with Laravel's Eloquent ORM, and it's part of Laravel's built-in support for handling failed jobs in the queue system.
*It ensures that information about failed jobs is stored in the created 'failed_jobs' table for later analysis and debugging.
*/
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('failed_jobs');
    }
};
