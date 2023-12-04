<?php

/*
* Filename: PlaceController.php
* Creation date: Nov 3 2023
* Update date: Dec 3 2023
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
     * Function called by ???.vue when the form is submitted to check data with the route: /place/verif (post)
     * Checks the informations entered in the form, sends errors if needed
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verif_place(Request $request){
        $this->validate(
            $request,
            [
                // max: 255
                'plc_nom' => 'required|string|min:1|max:255',
                'plc_idsitra' => 'required|string|min:1|max:255',
                'plc_theme' => 'required|string|min:1|max:255',
                'plc_type' => 'required|string|min:1|max:255',
                'plc_address' => 'required|string|min:1|max:255',
                'plc_insee'=> 'required|string|min:1|max:255',
                'plc_descrcourtfr' => 'required|string|min:1|max:255',
                'plc_descrdetailfr' => 'required|string|min:1|max:255',
                'plc_contact' => 'required|string|min:1|max:255',
                'plc_ouvertureenclair' => 'required|string|min:1|max:255',
                'plc_ouverture' => 'required|string|min:1|max:255' ,
                'plc_tarifsenclair' => 'required|string|min:1|max:255',
                'plc_tarifmin' => 'required|numeric|min:1|max:255',
                'plc_tarifmax' => 'required|numeric|min:1|max:255',
                'plc_modepaiement' => 'required|string|min:1|max:255',
                'plc_illustrationsn' => 'required|string|min:1|max:255',
                'plc_producteur' => 'required|string|min:1|max:255',
                'plc_datecreation' => 'nullable|date|timezone:UTC', // Adjust 'UTC' to the appropriate timezone
                'plc_datemaj' => 'nullable|date|timezone:UTC', // Adjust 'UTC' to the appropriate timezone
                'plc_gid' => 'required|numeric|min:1|max:255',
                'plc_validated' => 'required|boolean',
            ],
            [
                'plc_nom.required' => 'You must enter a name for your place',
                'plc_nom.string' => 'The name field must be a string',
                'plc_nom.min' => 'You must enter a minimum of one character ',
                'plc_nom.max' => 'You must enter a maximum of 255 characters',

                'plc_idsitra.required' => 'You must enter a SITRA id for your place',
                'plc_idsitra.string' => 'The SITRA id field must be a string',
                'plc_idsitra.min' => 'You must enter a minimum of one character',
                'plc_idsitra.max' => 'You must enter a maximum of 255 characters',
                
                'plc_theme.required' => 'You must enter a theme for your place',
                'plc_theme.json' => 'The theme field must be a string',
                'plc_theme.min' => 'The theme must be a minimum of one character',
                'plc_theme.max' => 'The theme must be a maximum of 255 characters',

                'plc_type.required' => 'You must enter a type for your place',
                'plc_type.string' => 'The type field must be a string',
                'plc_type.min' => 'The type must be a minimum of one character',
                'plc_type.max' => 'The type must be a maximum of 255 characters',

                'plc_address.required' => 'You must enter an address for your place',
                'plc_address.json' => 'The address field must be a string',
                'plc_address.min' => 'The address must be a minimum of one character',
                'plc_address.max' => 'The address must be a maximum of 255 characters',

                'plc_insee.required' => 'You must enter an INSEE code for your place',
                'plc_insee.string' => 'The INSEE code field must be a string',
                'plc_insee.min' => 'The INSEE code must be a minimum of one character',
                'plc_insee.max' => 'The INSEE code must be a maximum of 255 characters',

                'plc_descrcourtfr.required' => 'You must enter a short description in French for your place',
                'plc_descrcourtfr.string' => 'The short description in French field must be a string',
                'plc_descrcourtfr.min' => 'The short description in French must be a minimum of one character',
                'plc_descrcourtfr.max' => 'The short description in French must be a maximum of 255 characters',

                'plc_descrdetailfr.required' => 'You must enter a detailed description in French for your place',
                'plc_descrdetailfr.string' => 'The detailed description in French field must be a string',
                'plc_descrdetailfr.min' => 'The detailed description in French must be a minimum of one character',
                'plc_descrdetailfr.max' => 'The detailed description in French must be a maximum of 255 characters',

                'plc_contact.required' => 'You must enter contact information for your place',
                'plc_contact.json' => 'The contact information field must be a string',
                'plc_contact.min' => 'The contact information must be a minimum of one character',
                'plc_contact.max' => 'The contact information must be a maximum of 255 characters',

                'plc_ouvertureenclair.required' => 'You must enter opening information for your place',
                'plc_ouvertureenclair.string' => 'The opening information field must be a string',
                'plc_ouvertureenclair.min' => 'The opening information must be a minimum of one character',
                'plc_ouvertureenclair.max' => 'The opening information must be a maximum of 255 characters',

                'plc_ouverture.required' => 'You must enter detailed opening information for your place',
                'plc_ouverture.json' => 'The detailed opening information field must be a string',
                'plc_ouverture.min' => 'The detailed opening information must be a minimum of one character',
                'plc_ouverture.max' => 'The detailed opening information must be a maximum of 255 characters',

                'plc_tarifsenclair.required' => 'You must enter pricing information for your place',
                'plc_tarifsenclair.string' => 'The pricing information field must be a string',
                'plc_tarifsenclair.min' => 'The pricing information must be a minimum of one character',
                'plc_tarifsenclair.max' => 'The pricing information must be a maximum of 255 characters',

                'plc_tarifmin.required' => 'You must enter a minimum price for your place',
                'plc_tarifmin.numeric' => 'The minimum price field must be a numeric value',
                'plc_tarifmin.min' => 'The minimum price must be a minimum of one character',
                'plc_tarifmin.max' => 'The minimum price must be a maximum of 255 characters',

                'plc_tarifmax.required' => 'You must enter a maximum price for your place',
                'plc_tarifmax.numeric' => 'The maximum price field must be a numeric value',
                'plc_tarifmax.min' => 'The maximum price must be a minimum of one character',
                'plc_tarifmax.max' => 'The minimum price must be a maximum of 255 characters',

                'plc_modepaiement.required' => 'You must enter payment mode information for your place',
                'plc_modepaiement.json' => 'The payment mode information field must be a string',
                'plc_modepaiement.min' => 'The payment mode information must be a minimum of one character',
                'plc_modepaiement.max' => 'The payment mode information must be a maximum of 255 characters',

                'plc_illustrationsn.required' => 'You must enter illustration information for your place',
                'plc_illustrationsn.json' => 'The illustration information field must be a string',
                'plc_illustrationsn.min' => 'The illustration information must be a minimum of one character',
                'plc_illustrationsn.max' => 'The illustration information must be a maximum of 255 characters',

                'plc_producteur.required' => 'You must enter producer information for your place',
                'plc_producteur.string' => 'The producer information field must be a string',
                'plc_producteur.min' => 'The producer information must be a minimum of one character',
                'plc_producteur.max' => 'The producer information must be a maximum of 255 characters',

                'plc_datecreation.nullable' => 'The date creation field must be a valid date if provided',
                'plc_datecreation.date' => 'The date creation field must be a valid date format',
                'plc_datecreation.timezone' => 'The date creation field must be in the correct timezone',

                'plc_datemaj.nullable' => 'The date maj field must be a valid date if provided',
                'plc_datemaj.date' => 'The date maj field must be a valid date format',
                'plc_datemaj.timezone' => 'The date maj field must be in the correct timezone',

                'plc_gid.required' => 'You must enter a GID for your place',
                'plc_gid.numeric' => 'The GID field must be a numeric value',
                'plc_gid.min' => 'The GID must be a minimum of one character',
                'plc_gid.max' => 'The GID must be a maximum of 255 characters',

                'plc_validated.required' => 'You must enter a validation status for your place',
                'plc_validated.boolean' => 'The validation status field must be a boolean value',
            ]
        );
    }

    /**
     * Function called by ???.vue when the form is submitted to insert with the route: /place/add (post)
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
     * Function call by ??.vue with the route : /place/all (get)
     * Get a list of all the places validated in the database 
     * @return \Illuminate\Http\Response
     */
    public function send_places(){
        $places = Place::all();
        $array = [];
        foreach ($places as $place) {
            $obj = [
                'id' => $place->id,
                'plc_nom' => $place->plc_nom,
                'plc_theme' => $place->plc_theme,
                'plc_type' => $place->plc_type,
                'plc_tarifsenclair' => $place->plc_tarifsenclair,
                'plc_illustrations' => $place->plc_illustrations,
            ];
            array_push($array, $obj);
        }
        return response()->json($array);
    }

    /**
     * Function call by ??.vue with the route : /place/{id} (get)
     * Get the place with the id given in parameter 
     * @param int $id The id of the place
     * @return \Illuminate\Http\Response
     */
    public function send_place($id){
        
        $place=Place::findOrFail($id);
        return response()->json([
            'plc_idsitra' => $place->plc_idsitra, 
            'plc_nom' => $place->plc_nom,
            'plc_theme' => $place->plc_theme,
            'plc_type' => $place->plc_type,
            'plc_address' => $place->plc_address, 
            'plc_insee' => $place->plc_insee,
            'plc_descrcourtfr' => $place->plc_descrcourtfr,
            'plc_descrdetailfr' => $place->plc_descrdetailfr,
            'plc_contact' => $place->plc_contact,
            'plc_ouvertureenclair' => $place->plc_ouvertureenclair,
            'plc_ouverture' => $place->plc_ouverture,
            'plc_tarifsenclair' => $place->plc_tarifsenclair, 
            'plc_tarifmin' => $place->plc_tarifmin,
            'plc_tarifmax' => $place->plc_tarifmax, 
            'plc_modepaiement' => $place->plc_modepaiement,
            'plc_illustrations' => $place->plc_illustrations, 
            'plc_producteur' => $place->plc_producteur,
        ]);
    }

    /**
     * Function called by ???.vue when the form is submitted for update with the route: /place/update/{id} (post)
     * Updates an enregistrement of place in the data base with the informations entered in the form
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id the id of the place we want to update
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
     * Function call by Example???.vue when we want to delete a place with the route : /place/delete (post)
     * Delete a place thanks to the id given in parameter
     * @param int $id the id of the place we want to delete
     */
    public function delete_place(Request $request, $id){
        $place=Place::findOrFail($id);
        $place->delete();
    }
}
