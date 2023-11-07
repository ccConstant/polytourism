<?php

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

            $table->string('plc_idsitra');
            $table->string('plc_nom');
            $table->jsonb('plc_theme');
            $table->string('plc_type');
            $table->jsonb('plc_address');
            $table->string('plc_insee');
            $table->string('place_descrcourtfr');
            $table->string('plc_descrdetailfr');
            $table->jsonb('plc_contact');
            $table->string('plc_ouvertureenclair');
            $table->jsonb('plc_ouverture');
            $table->string('plc_tarifsenclair');
            $table->float('plc_tarifmin');
            $table->float('plc_tarifmax');
            $table->jsonb('plc_modepaiement');
            $table->jsonb('plc_illustrations');
            $table->string('plc_producteur');
            $table->timestampTz('plc_datecreation')->nullable();
            $table->timestampTz('plc_datemaj')->nullable();
            $table->integer('plc_gid');
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
