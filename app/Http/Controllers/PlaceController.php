<?php

/*
* Filename: PlaceController.php
* Creation date: Nov 3 2023
* Update date: Nov 4 2023
* This file is used to link the view files and the database that concern the Place table.
* For example: add a place, update a place, import a place, delete a place...
*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Function called by ???.vue when the form is submitted to check data with the route: ???? (post)
     * Checks the informations entered in the form, sends errors if needed
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verif_place(Request $request){
        $this->validate(
            $request,
            [
                // max: 255
                'plc_nom' => 'required',
            ],
            [
                'plc_nom.required' => 'You must enter a name for your place',
            ]
            // TODO: verifications for the attributes
            // string('plc_idsitra');
            // jsonb('plc_theme');
            // string('plc_type');
            // jsonb('plc_address');
            // string('plc_insee');
            // string('plc_descrcourtfr');
            // string('plc_descrdetailfr');
            // jsonb('plc_contact');
            // string('plc_ouvertureenclair');
            // jsonb('plc_ouverture');
            // string('plc_tarifsenclair');
            // float('plc_tarifmin');
            // float('plc_tarifmax');
            // jsonb('plc_modepaiement');
            // jsonb('plc_illustrations');
            // string('plc_producteur');
            // timestampTz('plc_datecreation')->nullable();
            // timestampTz('plc_datemaj')->nullable();
            // integer('plc_gid');
        );
    }

    /**
     * Function called by ???.vue when the form is submitted to insert with the route: ???? (post)
     * Adds a place to the database
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_place(Request $request){
        $place=Place::create([
            'plc_idsitra' => $request->plc_idsitra,
            'plc_nom' => $request->plc_nom,
            'plc_theme' => $request->plc_theme,
            'plc_type' => $request->plc_type,
            'plc_address' => $request->plc_address,
            'plc_insee' => $request->plc_insee,
            'plc_descrcourtfr' => $request->plc_descrcourtfr,
            'plc_descrdetailfr' => $request->plc_descrdetailfr,
            'plc_contact' => $request->plc_contact,
            'plc_ouvertureenclair' => $request->plc_ouvertureenclair,
            'plc_ouverture' => $request->plc_ouverture,
            'plc_tarifsenclair' => $request->plc_tarifsenclair,
            'plc_tarifmin' => $request->plc_tarifmin,
            'plc_tarifmax' => $request->plc_tarifmax,
            'plc_modepaiement' => $request->plc_modepaiement,
            'plc_illustrations' => $request->plc_illustrations,
            'plc_producteur' => $request->plc_producteur,
            'plc_datecreation' => $request->plc_datecreation,
            'plc_datemaj' => $request->plc_datemaj,
            'plc_gid' => $request->plc_gid,
        ]);

        $plc_id=$place->id;
        return response()->json([
            'plc_id' => $plc_id,
        ]);
    }

    /**
     * Function call by ??.vue with the route : ?? (get)
     * Get ?? 
     * @param int $id The if of the ???
     * @return \Illuminate\Http\Response
     */
    public function send_places($id){
        // TODO
    }

    /**
     * Function called by ???.vue when the form is submitted for update with the route: ??? (post)
     * Updates an enregistrement of ?? in the data base with the informations entered in the form
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id the id of the ??? we want to update
     * @return \Illuminate\Http\Response
     */
    public function update_place(Request $request, $id){
        $place=Place::findOrFail($id);
        $place->update([
            'plc_idsitra' => $request->plc_idsitra,
            'plc_nom' => $request->plc_nom,
            'plc_theme' => $request->plc_theme,
            'plc_type' => $request->plc_type,
            'plc_address' => $request->plc_address,
            'plc_insee' => $request->plc_insee,
            'plc_descrcourtfr' => $request->plc_descrcourtfr,
            'plc_descrdetailfr' => $request->plc_descrdetailfr,
            'plc_contact' => $request->plc_contact,
            'plc_ouvertureenclair' => $request->plc_ouvertureenclair,
            'plc_ouverture' => $request->plc_ouverture,
            'plc_tarifsenclair' => $request->plc_tarifsenclair,
            'plc_tarifmin' => $request->plc_tarifmin,
            'plc_tarifmax' => $request->plc_tarifmax,
            'plc_modepaiement' => $request->plc_modepaiement,
            'plc_illustrations' => $request->plc_illustrations,
            'plc_producteur' => $request->plc_producteur,
            'plc_datecreation' => $request->plc_datecreation,
            'plc_datemaj' => $request->plc_datemaj,
            'plc_gid' => $request->plc_gid,
        ]);
    }

    /**
     * Function call by Example???.vue when we want to delete a ?? with the route :??(post)
     * Deletes a ??? thanks to the id given in parameter
     * @param int $id the id of the ??? we want to delete
     */
    public function delete_place(Request $request, $id){
        $place=Place::findOrFail($id);
        $place->delete();
    }
}
