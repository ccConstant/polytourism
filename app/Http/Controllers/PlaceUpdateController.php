<?php

/*
* Filename: PlaceUpdateController.php
* Creation date: Dec 3 2023
* Update date: Jan 01 2024
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
            'plcUpdt_validated' => $request->plcUpdt_validated,
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
            'plc_tarifsenclair' => $placeUpdate->plcUpdt_tarifsenclair,
            'plc_illustrations' => $placeUpdate->plcUpdt_illustrations,
            'plcUpdt_validated' => 'required|boolean',
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
                'plcUpdt_nom' => 'required|string|min:1|max:255',
                'plcUpdt_theme' => 'required|string|min:1|max:255',
                'plcUpdt_address' => 'required|string|min:1|max:255',
                'plcUpdt_descrcourtfr' => 'required|string|min:1|max:255',
                'plcUpdt_descrdetailfr' => 'required|string|min:1|max:255',
                'plcUpdt_contact' => 'required|string|min:1|max:255',
                'plcUpdt_ouvertureenclair' => 'required|string|min:1|max:255',
                'plcUpdt_tarifsenclair' => 'required|string|min:1|max:255',
                'plcUpdt_illustrations' => 'required|file|mimes:jpeg,png|max:2048',
                'plcUpdt_validated' => 'required|boolean',
            ],
            [
                'plcUpdt_nom.required' => 'You must enter a name for your place',
                'plcUpdt_nom.string' => 'The name field must be a string',
                'plcUpdt_nom.min' => 'You must enter a minimum of one character ',
                'plcUpdt_nom.max' => 'You must enter a maximum of 255 characters',
                
                'plcUpdt_theme.required' => 'You must enter a theme for your place',
                'plcUpdt_theme.json' => 'The theme field must be a string',
                'plcUpdt_theme.min' => 'The theme must be a minimum of one character',
                'plcUpdt_theme.max' => 'The theme must be a maximum of 255 characters',

                'plcUpdt_address.required' => 'You must enter an address for your place',
                'plcUpdt_address.json' => 'The address field must be a string',
                'plcUpdt_address.min' => 'The address must be a minimum of one character',
                'plcUpdt_address.max' => 'The address must be a maximum of 255 characters',

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

                'plcUpdt_tarifsenclair.required' => 'You must enter pricing information for your place',
                'plcUpdt_tarifsenclair.string' => 'The pricing information field must be a string',
                'plcUpdt_tarifsenclair.min' => 'The pricing information must be a minimum of one character',
                'plcUpdt_tarifsenclair.max' => 'The pricing information must be a maximum of 255 characters',

                'plcUpdt_illustrations.required' => 'You must enter illustration information for your place.',
                'plcUpdt_illustrations.file' => 'The selected illustration must be a file.',
                'plcUpdt_illustrations.mimes' => 'The illustration must be a JPEG or PNG file.',
                'plcUpdt_illustrations.max' => 'The illustration must not be larger than 2048 kilobytes.',

                'plcUpdt_validated.required' => 'You must enter a validation status for your place',
                'plcUpdt_validated.boolean' => 'The validation status field must be a boolean value',
            ]
        );
    }
}
