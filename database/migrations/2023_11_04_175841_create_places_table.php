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
            $table->string('plc_theme')->nullable();
            $table->string('plc_address')->nullable();
            $table->string('plc_descrcourtfr')->nullable();
            $table->string('plc_descrdetailfr')->nullable();
            $table->string('plc_contact')->nullable();
            $table->string('plc_ouvertureenclair')->nullable();
            $table->string('plc_ouverture')->nullable();
            $table->string('plc_tarifsenclair')->nullable();
            $table->string('plc_illustrations')->nullable();
            $table->boolean('plc_validated');
            //$table->geometry('the_geom'); // type: geometry SRID=4171 GeomType=POINT on the GrandLyon website 

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
