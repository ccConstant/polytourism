<?php

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
        'plc_ouverture',
        'plc_tarifsenclair',
        'plc_illustrations',
        'plc_validated',
    ];
}
