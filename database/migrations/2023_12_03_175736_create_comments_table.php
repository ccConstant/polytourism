<?php

/*
* Filename: 2023_12_03_175736_create_comments_table.php
* Creation date: Dec 3 2023
* Update date: 
* This file is used create the 'comments' table in the database.
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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('comment_rating'); //to check/constraint from 1 to 5
            $table->string('comment_text');
            $table->date('comment_date');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string("user_pseudo");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
