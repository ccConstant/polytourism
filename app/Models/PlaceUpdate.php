<?php

/**
 * Filename: PlaceUpdate.php
 * Creation date: 4 Dec 2023
 * Update date: 14 Dec 2023
 * This file defines the model PlaceUpdate.
 * We can see more details about this model (like its attributes)
 * in the migration file named "2023_12_04_173829_create_place_updates_table" in database/migrations.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceUpdate extends Model
{
    use HasFactory;
    protected $fillable = [
        'plcUpdt_nom',
        'plcUpdt_theme',
        'plcUpdt_address',
        'plcUpdt_descrcourtfr',
        'plcUpdt_descrdetailfr',
        'plcUpdt_contact',
        'plcUpdt_ouvertureenclair',
        'plcUpdt_tarifsenclair',
        'plcUpdt_illustrations',
        'plcUpdt_validated',
        'plc_id',
    ];
}
