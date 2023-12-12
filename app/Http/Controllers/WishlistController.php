<?php

/*
* Filename: WishlistController.php
* Creation date: Dec 4 2023
* Update date: Dec 6 2023
* This file is used to link the view files and the database that concern the Wishlist table.
* For example: add a place to a user's wishlist, delete a wishlist...
*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Function called by ???.vue when a place is added to the wishlist: /wishlist/verif (post)
     * Checks the values, sends errors if needed
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verif_wishlist(Request $request){ 
        $this->validate(
            $request,
            [
                'plc_id' => 'required|exists:place,id',
                'user_id' => 'required|exists:user,id',
            ],
            [
                'plc_id.required' => 'The place id is required',
                'plc_id.exists' => 'The place id must exist in the place table',

                'user_id.required' => 'The user id is required',
                'user_id.exists' => 'The user id must exist in the user table',
            ]
        );
    }

    /**
     * Function called by ???.vue when the form is submitted to insert with the route: /wishlist/add (post)
     * Adds a wishlist to the database
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_wishlist(Request $request){
        $wishlist=Wishlist::createOrFirst([
            'plc_id' => $request->plc_id,
            'user_id' => $request->user_id,
        ]);
        $wsh_id = $wishlist->id;
        return response()->json([
            'wsh_id' => $wsh_id,
        ]);
    }

    /**
     * Function called by ??.vue with the route : /wishlist/{id} (get)
     * Get the full wishlist of the user connected
     * The id parameter corresponds to the id of the user connected 
     * @param int $id the id of the user connected
     * @return \Illuminate\Http\Response
     */
    public function send_wishlists($id){
        $wishlists = Wishlist::where('user_id', $id)->get();
        $array = [];
        foreach($wishlists as $wishlist){
            $obj = [
                'plc_id' => $wishlist->plc_id,
                'user_id' => $wishlist->user_id,
            ];
            array_push($array, $obj);
        }
        return response()->json($array);
    }

    /**
     * Function call by ???.vue when we want to delete a wishlist with the route : /wishlist/delete (post)
     * Delete a wishlist thanks to the id given in parameter
     * @param int $id the id of the wishlist we want to delete
     */
    public function delete_wishlist(Request $request, $id){
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();
    }
}
