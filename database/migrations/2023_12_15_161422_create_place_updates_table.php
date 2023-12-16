<?php

/*
* Filename: 2023_12_15_161422_create_place_updates_table.php
* Creation date: Dec 15 2023
* Update date: Dec 15 2023
* This file is used create the 'place_updates' table in the database.
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
        Schema::create('place_updates', function (Blueprint $table) {
            $table->id();

            $table->string('plcUpdt_nom')->nullable();
            $table->jsonb('plcUpdt_theme')->nullable();
            $table->jsonb('plcUpdt_address',1000)->nullable();
            $table->string('plcUpdt_descrcourtfr')->nullable();
            $table->string('plcUpdt_descrdetailfr',3500)->nullable();
            $table->jsonb('plcUpdt_contact',1500)->nullable();
            $table->string('plcUpdt_ouvertureenclair',1000)->nullable();
            $table->string('plcUpdt_tarifsenclair',1000)->nullable();
            $table->jsonb('plcUpdt_illustrations',7000)->nullable();
            $table->boolean('plcUpdt_validated')->default(false);
            $table->unsignedBigInteger('plc_id');

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
        Schema::dropIfExists('place_update');
    }
};

