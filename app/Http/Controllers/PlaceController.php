<?php

/*
* Filename: PlaceController.php
* Creation date: Nov 3 2023
* Update date: Dec 14 2023
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
                'plc_nom' => 'required|string|min:1|max:255',
                'plc_theme' => 'required|string|min:1|max:255',
                'plc_address' => 'required|string|min:1|max:255',
                'plc_descrcourtfr' => 'required|string|min:1|max:255',
                'plc_descrdetailfr' => 'required|string|min:1|max:255',
                'plc_contact' => 'required|string|min:1|max:255',
                'plc_ouvertureenclair' => 'required|string|min:1|max:255',
                'plc_tarifsenclair' => 'required|string|min:1|max:255',
                'plc_illustrationsn' => 'required|string|min:1|max:255',
                'plc_validated' => 'required|boolean',
            ],
            [
                'plc_nom.required' => 'You must enter a name for your place',
                'plc_nom.string' => 'The name field must be a string',
                'plc_nom.min' => 'You must enter a minimum of one character ',
                'plc_nom.max' => 'You must enter a maximum of 255 characters',
                
                'plc_theme.required' => 'You must enter a theme for your place',
                'plc_theme.json' => 'The theme field must be a string',
                'plc_theme.min' => 'The theme must be a minimum of one character',
                'plc_theme.max' => 'The theme must be a maximum of 255 characters',

                'plc_address.required' => 'You must enter an address for your place',
                'plc_address.json' => 'The address field must be a string',
                'plc_address.min' => 'The address must be a minimum of one character',
                'plc_address.max' => 'The address must be a maximum of 255 characters',

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

                'plc_tarifsenclair.required' => 'You must enter pricing information for your place',
                'plc_tarifsenclair.string' => 'The pricing information field must be a string',
                'plc_tarifsenclair.min' => 'The pricing information must be a minimum of one character',
                'plc_tarifsenclair.max' => 'The pricing information must be a maximum of 255 characters',

                'plc_illustrationsn.required' => 'You must enter illustration information for your place',
                'plc_illustrationsn.json' => 'The illustration information field must be a string',
                'plc_illustrationsn.min' => 'The illustration information must be a minimum of one character',
                'plc_illustrationsn.max' => 'The illustration information must be a maximum of 255 characters',

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
            'plc_nom' => $request->plc_nom,
            'plc_theme' => $request->plc_theme,
            'plc_address' => $request->plc_address,
            'plc_descrcourtfr' => $request->plc_descrcourtfr,
            'plc_descrdetailfr' => $request->plc_descrdetailfr,
            'plc_contact' => $request->plc_contact,
            'plc_ouvertureenclair' => $request->plc_ouvertureenclair,
            'plc_tarifsenclair' => $request->plc_tarifsenclair,
            'plc_illustrations' => $request->plc_illustrations,
            'plc_validated' => '0',
        ]);

        $plc_id=$place->id;
        return response()->json([
            'plc_id' => $plc_id,
        ]);
    }

    /**
     * Function call by ListPlaces.vue with the route : /place/all (get)
     * Get a list of all the places validated in the database with most important information of a place
     * @return \Illuminate\Http\Response
     */
    public function send_places(){
        // à changer
        $places = Place::where('plc_validated', 0)->get();
        $array = [];
        foreach ($places as $place) {
            $obj = [
                'id' => $place->id,
                'plc_nom' => $place->plc_nom,
                'plc_theme' => $place->plc_theme,
                'plc_type' => $place->plc_type,
                'plc_address' => $place->plc_address,
                'plc_tarifsenclair' => $place->plc_tarifsenclair,
                'plc_illustrations' => $place->plc_illustrations,
            ];
            array_push($array, $obj);
        }
        return response()->json($array);
    }

    /**
     * Function call by PlaceDetails.vue with the route : /place/{id} (get)
     * Get the place with the id given in parameter 
     * @param int $id The id of the place
     * @return \Illuminate\Http\Response
     */
    public function send_place($id){
        
        $place=Place::findOrFail($id);
        return response()->json([
            'plc_nom' => $place->plc_nom,
            'plc_theme' => $place->plc_theme,
            'plc_address' => $place->plc_address, 
            'plc_descrcourtfr' => $place->plc_descrcourtfr,
            'plc_descrdetailfr' => $place->plc_descrdetailfr,
            'plc_contact' => $place->plc_contact,
            'plc_ouvertureenclair' => $place->plc_ouvertureenclair,
            'plc_modepaiement' => $place->plc_modepaiement,
            'plc_illustrations' => $place->plc_illustrations, 
            'plc_tarifsenclair' => $place->plc_tarifsenclair,
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
            'plc_nom' => $request->plc_nom,
            'plc_theme' => $request->plc_theme,
            'plc_address' => $request->plc_address,
            'plc_descrcourtfr' => $request->plc_descrcourtfr,
            'plc_descrdetailfr' => $request->plc_descrdetailfr,
            'plc_contact' => $request->plc_contact,
            'plc_ouvertureenclair' => $request->plc_ouvertureenclair,
            'plc_tarifsenclair' => $request->plc_tarifsenclair,
            'plc_illustrations' => $request->plc_illustrations,
            'plc_validated' => $request->plc_validated,
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

    /**
     * Function call by Example???.vue when we want to send a list of themes with the route: /place/themes (get)
     * Get a list of all the themes in the database
     * @return \Illuminate\Http\Response
     */
    public function send_themes(){
        $places = Place::all();
        $array = [];
        // note optimised
        foreach ($places as $place) {
            $obj = explode(', ', str_replace("'", "", substr($place->plc_theme,2,-2)));
            foreach ($obj as $theme) {
                if (!in_array($theme, $array)) {
                    array_push($array, $theme);
                }
            }
        }
        return response()->json($array);
    }
}
