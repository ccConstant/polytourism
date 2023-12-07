<?php

/*
* Filename: 2023_12_04_173408_create_comments_table.php
* Creation date: Dec 4 2023
* Update date: Dec 6 2023
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
            $table->unsignedBigInteger('user_id');
            $table->string("user_pseudo");
            $table->unsignedBigInteger('plc_id');
            $table->integer('com_rating');
            $table->string('com_title');
            $table->string('com_text');
            $table->date('com_date');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('plc_id')
                ->references('id')
                ->on('places')
                ->onDelete('cascade');
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

