<?php

/*
* Filename: PlaceUpdateController.php
* Creation date: Dec 3 2023
* Update date: Dec 3 2023
* This file is used to link the view files and the database that concern the Place Update table.
* For example: add a place update, delete a place update...
*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlaceUpdate;
use App\Models\Place;

class PlaceUpdateController extends Controller
{
    /**
     * Function called by ???.vue when the form is submitted to insert with the route: /placeUpdate/add (post)
     * Add a place update to the database
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response : the id of the place update
     */
    public function add_placeUpdate($request){
    $placeUpdate=PlaceUpdate::create([
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
        return $placeUpdate->id;
    }

    /**
     * Function called by ???.vue for validate the placeUpdate with the route: /placeUpdate/validate/{id} (post)
     * Validate a place_update in the database
     * @param  \Illuminate\Http\Request  $id : the id of the place update
     */
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

    /**
     * Function called by ???.vue for delete the placeUpdate with the route: /placeUpdate/delete/{id} (post)
     * Delete a place_update in the database
     * @param  \Illuminate\Http\Request  $id : the id of the place update we want to delete
     */
    public function delete_placeUpdate($id){
        PlaceUpdate::findOrFail($id)->delete();
    }

    /**
     * Function called by ???.vue for send all the place updates with the route: /placeUpdate/all (get)
     * Send all the place updates in the database
     * @return \Illuminate\Http\Response : all the place updates
     */
    public function send_placeUpdates(){
        $placeUpdates = PlaceUpdate::all();
        return $placeUpdates;
    }


    /**
     * Function called by ???.vue when the form is submitted to check data with the route: /placeUpdate/verif (post)
     * Checks the informations entered in the form, sends errors if needed
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verif_placeUpdate(Request $request){
        $this->validate(
            $request,
            [
                // max: 255
                'plcUpdt_nom' => 'required|string|min:1|max:255',
                'plcUpdt_idsitra' => 'required|string|min:1|max:255',
                'plcUpdt_theme' => 'required|string|min:1|max:255',
                'plcUpdt_address' => 'required|string|min:1|max:255',
                'plcUpdt_insee'=> 'required|string|min:1|max:255',
                'plcUpdt_descrcourtfr' => 'required|string|min:1|max:255',
                'plcUpdt_descrdetailfr' => 'required|string|min:1|max:255',
                'plcUpdt_contact' => 'required|string|min:1|max:255',
                'plcUpdt_ouvertureenclair' => 'required|string|min:1|max:255',
                'plcUpdt_ouverture' => 'required|string|min:1|max:255' ,
                'plcUpdt_tarifsenclair' => 'required|string|min:1|max:255',
                'plcUpdt_tarifmin' => 'required|numeric|min:1|max:255',
                'plcUpdt_tarifmax' => 'required|numeric|min:1|max:255',
                'plcUpdt_modepaiement' => 'required|string|min:1|max:255',
                'plcUpdt_illustrationsn' => 'required|string|min:1|max:255',
                'plcUpdt_producteur' => 'required|string|min:1|max:255',
                'plcUpdt_datecreation' => 'nullable|date|timezone:UTC', // Adjust 'UTC' to the appropriate timezone
                'plcUpdt_datemaj' => 'nullable|date|timezone:UTC', // Adjust 'UTC' to the appropriate timezone
                'plcUpdt_gid' => 'required|numeric|min:1|max:255',
                'plcUpdt_validated' => 'required|boolean',
            ],
            [
                'plcUpdt_nom.required' => 'You must enter a name for your place',
                'plcUpdt_nom.string' => 'The name field must be a string',
                'plcUpdt_nom.min' => 'You must enter a minimum of one character ',
                'plcUpdt_nom.max' => 'You must enter a maximum of 255 characters',

                'plcUpdt_idsitra.required' => 'You must enter a SITRA id for your place',
                'plcUpdt_idsitra.string' => 'The SITRA id field must be a string',
                'plcUpdt_idsitra.min' => 'You must enter a minimum of one character',
                'plcUpdt_idsitra.max' => 'You must enter a maximum of 255 characters',
                
                'plcUpdt_theme.required' => 'You must enter a theme for your place',
                'plcUpdt_theme.json' => 'The theme field must be a string',
                'plcUpdt_theme.min' => 'The theme must be a minimum of one character',
                'plcUpdt_theme.max' => 'The theme must be a maximum of 255 characters',

                'plcUpdt_address.required' => 'You must enter an address for your place',
                'plcUpdt_address.json' => 'The address field must be a string',
                'plcUpdt_address.min' => 'The address must be a minimum of one character',
                'plcUpdt_address.max' => 'The address must be a maximum of 255 characters',

                'plcUpdt_insee.required' => 'You must enter an INSEE code for your place',
                'plcUpdt_insee.string' => 'The INSEE code field must be a string',
                'plcUpdt_insee.min' => 'The INSEE code must be a minimum of one character',
                'plcUpdt_insee.max' => 'The INSEE code must be a maximum of 255 characters',

                'plcUpdt_descrcourtfr.required' => 'You must enter a short description in French for your place',
                'plcUpdt_descrcourtfr.string' => 'The short description in French field must be a string',
                'plcUpdt_descrcourtfr.min' => 'The short description in French must be a minimum of one character',
                'plcUpdt_descrcourtfr.max' => 'The short description in French must be a maximum of 255 characters',

                'plcUpdt_descrdetailfr.required' => 'You must enter a detailed description in French for your place',
                'plcUpdt_descrdetailfr.string' => 'The detailed description in French field must be a string',
                'plcUpdt_descrdetailfr.min' => 'The detailed description in French must be a minimum of one character',
                'plcUpdt_descrdetailfr.max' => 'The detailed description in French must be a maximum of 255 characters',

                'plcUpdt_contact.required' => 'You must enter contact information for your place',
                'plcUpdt_contact.json' => 'The contact information field must be a string',
                'plcUpdt_contact.min' => 'The contact information must be a minimum of one character',
                'plcUpdt_contact.max' => 'The contact information must be a maximum of 255 characters',

                'plcUpdt_ouvertureenclair.required' => 'You must enter opening information for your place',
                'plcUpdt_ouvertureenclair.string' => 'The opening information field must be a string',
                'plcUpdt_ouvertureenclair.min' => 'The opening information must be a minimum of one character',
                'plcUpdt_ouvertureenclair.max' => 'The opening information must be a maximum of 255 characters',

                'plcUpdt_ouverture.required' => 'You must enter detailed opening information for your place',
                'plcUpdt_ouverture.json' => 'The detailed opening information field must be a string',
                'plcUpdt_ouverture.min' => 'The detailed opening information must be a minimum of one character',
                'plcUpdt_ouverture.max' => 'The detailed opening information must be a maximum of 255 characters',

                'plcUpdt_tarifsenclair.required' => 'You must enter pricing information for your place',
                'plcUpdt_tarifsenclair.string' => 'The pricing information field must be a string',
                'plcUpdt_tarifsenclair.min' => 'The pricing information must be a minimum of one character',
                'plcUpdt_tarifsenclair.max' => 'The pricing information must be a maximum of 255 characters',

                'plcUpdt_tarifmin.required' => 'You must enter a minimum price for your place',
                'plcUpdt_tarifmin.numeric' => 'The minimum price field must be a numeric value',
                'plcUpdt_tarifmin.min' => 'The minimum price must be a minimum of one character',
                'plcUpdt_tarifmin.max' => 'The minimum price must be a maximum of 255 characters',

                'plcUpdt_tarifmax.required' => 'You must enter a maximum price for your place',
                'plcUpdt_tarifmax.numeric' => 'The maximum price field must be a numeric value',
                'plcUpdt_tarifmax.min' => 'The maximum price must be a minimum of one character',
                'plcUpdt_tarifmax.max' => 'The minimum price must be a maximum of 255 characters',

                'plcUpdt_modepaiement.required' => 'You must enter payment mode information for your place',
                'plcUpdt_modepaiement.json' => 'The payment mode information field must be a string',
                'plcUpdt_modepaiement.min' => 'The payment mode information must be a minimum of one character',
                'plcUpdt_modepaiement.max' => 'The payment mode information must be a maximum of 255 characters',

                'plcUpdt_illustrationsn.required' => 'You must enter illustration information for your place',
                'plcUpdt_illustrationsn.json' => 'The illustration information field must be a string',
                'plcUpdt_illustrationsn.min' => 'The illustration information must be a minimum of one character',
                'plcUpdt_illustrationsn.max' => 'The illustration information must be a maximum of 255 characters',

                'plcUpdt_producteur.required' => 'You must enter producer information for your place',
                'plcUpdt_producteur.string' => 'The producer information field must be a string',
                'plcUpdt_producteur.min' => 'The producer information must be a minimum of one character',
                'plcUpdt_producteur.max' => 'The producer information must be a maximum of 255 characters',

                'plcUpdt_datecreation.nullable' => 'The date creation field must be a valid date if provided',
                'plcUpdt_datecreation.date' => 'The date creation field must be a valid date format',
                'plcUpdt_datecreation.timezone' => 'The date creation field must be in the correct timezone',

                'plcUpdt_datemaj.nullable' => 'The date maj field must be a valid date if provided',
                'plcUpdt_datemaj.date' => 'The date maj field must be a valid date format',
                'plcUpdt_datemaj.timezone' => 'The date maj field must be in the correct timezone',

                'plcUpdt_gid.required' => 'You must enter a GID for your place',
                'plcUpdt_gid.numeric' => 'The GID field must be a numeric value',
                'plcUpdt_gid.min' => 'The GID must be a minimum of one character',
                'plcUpdt_gid.max' => 'The GID must be a maximum of 255 characters',

                'plcUpdt_validated.required' => 'You must enter a validation status for your place',
                'plcUpdt_validated.boolean' => 'The validation status field must be a boolean value',
            ]
        );
    }
}
