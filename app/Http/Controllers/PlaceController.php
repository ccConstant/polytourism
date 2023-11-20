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
        /*$places = Place::all();
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
        return response()->json($array);*/

        $array = [];
        $obj1 = [
            'id' => 1,
            'plc_nom' => "Hôtel de ville",
            'plc_theme' => ["#ACTIVITE"],
            'plc_tarifsenclair' => 10,
            'plc_illustrations' => "data:image/jpeg;base64,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",
        ];

        array_push($array, $obj1);
        array_push($array, $obj1);
        array_push($array, $obj1);
        
        return response()->json($array);


    }

    /**
     * Function call by ??.vue with the route : /place/{id} (get)
     * Get the place with the id given in parameter 
     * @param int $id The id of the place
     * @return \Illuminate\Http\Response
     */
    public function send_place($id){
        // TODO
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
