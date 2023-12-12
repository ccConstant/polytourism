<?php

/**
 * Filename: Wishlist.php
 * Creation date: 3 Dec 2023
 * Update date: 7 Dec 2023
 * This file defines the model Wishlist.
 * We can see more details about this model (like its attributes)
 * in the migration file named "2023_12_03_175749_create_wishlist_table" in database/migrations.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "plc_id",
    ];
}
