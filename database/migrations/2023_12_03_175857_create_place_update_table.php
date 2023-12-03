<?php
/*
* Filename: 2023_12_03_175857_create_place_update_table.php
* Creation date: Dec 3 2023
* Update date: 
* This file is used create the 'place_update' table in the database.
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
        Schema::create('place_update', function (Blueprint $table) {
            $table->id();

            $table->string('plcUpdt_idsitra');
            $table->string('plcUpdt_nom');
            $table->jsonb('plcUpdt_theme');
            $table->string('plcUpdt_type');
            $table->jsonb('plcUpdt_address');
            $table->string('plcUpdt_insee');
            $table->string('plcUpdt_descrcourtfr');
            $table->string('plcUpdt_descrdetailfr');
            $table->jsonb('plcUpdt_contact');
            $table->string('plcUpdt_ouvertureenclair');
            $table->jsonb('plcUpdt_ouverture');
            $table->string('plcUpdt_tarifsenclair');
            $table->float('plcUpdt_tarifmin');
            $table->float('plcUpdt_tarifmax');
            $table->jsonb('plcUpdt_modepaiement');
            $table->jsonb('plcUpdt_illustrations');
            $table->string('plcUpdt_producteur');
            $table->timestampTz('plcUpdt_datemaj')->nullable();
            $table->integer('plcUpdt_gid');
            $table->boolean('plcUpdt_validated');
            $table->integer('plc_id');

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
