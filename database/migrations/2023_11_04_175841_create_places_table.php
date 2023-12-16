<?php

/*
* Filename: 2023_11_04_175841_create_places_table.php
* Creation date: Nov 3 2023
* Update date: Dec 3 2023   
* This file is used create the 'places' table in the database.
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
        Schema::create('places', function (Blueprint $table) {
            $table->id();

            $table->string('plc_nom')->nullable(); 
            $table->jsonb('plc_theme')->nullable();
            $table->jsonb('plc_address', 1000)->nullable();
            $table->string('plc_descrcourtfr')->nullable();
            $table->string('plc_descrdetailfr', 3500)->nullable();
            $table->jsonb('plc_contact', 1500)->nullable();
            $table->string('plc_ouvertureenclair', 1000)->nullable();
            $table->string('plc_tarifsenclair',1000)->nullable();
            $table->jsonb('plc_illustrations', 7000)->nullable();
            $table->boolean('plc_validated')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
