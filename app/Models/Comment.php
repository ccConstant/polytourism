<?php

/**
 * Filename: Comment.php
 * Creation date: 4 Dec 2023
 * Update date: 7 Dec 2023
 * This file defines the model Comment.
 * We can see more details about this model (like its attributes)
 * in the migration file named "2023_12_04_173408_create_comments_table" in database/migrations.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "user_pseudo",
        "plc_id",
        "com_rating",
        "com_title",
        "com_text",
    ];
}
