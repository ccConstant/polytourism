<?php

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
        'plcUpdt_ouverture',
        'plcUpdt_tarifsenclair',
        'plcUpdt_illustrations',
        'plcUpdt_validated',
        'plc_id',
    ];
}
