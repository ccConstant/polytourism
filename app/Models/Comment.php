<?php

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
        "com_date",
    ];
}
