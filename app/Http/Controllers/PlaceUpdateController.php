<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlaceUpdate;
use App\Models\Place;

class PlaceUpdateController extends Controller
{
    
    public function add_placeUpdate($request){
        PlaceUpdate::create([
            'plcUpdt_nom' => $request->plcUpdt_nom,
            'plcUpdt_theme' => $request->plcUpdt_theme,
            'plcUpdt_address' => $request->plcUpdt_address,
            'plcUpdt_descrcourtfr' => $request->plcUpdt_descrcourtfr,
            'plcUpdt_descrdetailfr' => $request->plcUpdt_descrdetailfr,
            'plcUpdt_contact' => $request->plcUpdt_contact,
            'plcUpdt_ouvertureenclair' => $request->plcUpdt_ouvertureenclair,
            'plcUpdt_ouverture' => $request->plcUpdt_ouverture,
            'plcUpdt_tarifsenclair' => $request->plcUpdt_tarifsenclair,
            'plcUpdt_illustrations' => $request->plcUpdt_illustrations,
            'plc_id' => $request->plc_id,
        ]);
    }

    public function validate_placeUpdate($id){
        $placeUpdate = PlaceUpdate::find($id);
        Place::findOrFail($placeUpdate->plc_id)->update([
            'plc_nom' => $placeUpdate->plcUpdt_nom,
            'plc_theme' => $placeUpdate->plcUpdt_theme,
            'plc_address' => $placeUpdate->plcUpdt_address,
            'plc_descrcourtfr' => $placeUpdate->plcUpdt_descrcourtfr,
            'plc_descrdetailfr' => $placeUpdate->plcUpdt_descrdetailfr,
            'plc_contact' => $placeUpdate->plcUpdt_contact,
            'plc_ouvertureenclair' => $placeUpdate->plcUpdt_ouvertureenclair,
            'plc_ouverture' => $placeUpdate->plcUpdt_ouverture,
            'plc_tarifsenclair' => $placeUpdate->plcUpdt_tarifsenclair,
            'plc_illustrations' => $placeUpdate->plcUpdt_illustrations,
            'plc_validated' => 1,
        ]);
        PlaceUpdate::findOrFail($id)->delete();
    }

    public function delete_placeUpdate($id){
        PlaceUpdate::findOrFail($id)->delete();
    }

    public function send_placeUpdates(){
        $placeUpdates = PlaceUpdate::all();
        return $placeUpdates;
    }
}
