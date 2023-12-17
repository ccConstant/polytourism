<?php

/**
 * Filename: Place.php
 * Creation date: 4 Nov 2023
 * Update date: 16 Dec 2023
 * This file defines the model Place.
 * We can see more details about this model (like its attributes)
 * in the migration file named "2023_11_04_175841_create_places_table" in database/migrations.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $fillable = [
        'plc_nom',
        'plc_theme',
        'plc_address',
        'plc_descrcourtfr',
        'plc_descrdetailfr',
        'plc_contact',
        'plc_ouvertureenclair',
        'plc_tarifsenclair',
        'plc_illustrations',
        'plc_rating',
        'plc_validated',
    ];
}
