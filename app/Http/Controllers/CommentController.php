<?php

/*
* Filename: CommenyController.php
* Creation date: Dec 6 2023
* Update date: Dec 17 2023
* This file is used to link the view files and the database that concern the Comments table.
* For example: add a comment, delete a comment...
*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Function called by ???.vue when a comment is added: /comment/verif (post)
     * Checks the values, sends errors if needed
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verif_comment(Request $request){ 
        $this->validate(
            $request,
            [
                'user_id' => 'required|exists:user,id',
                'plc_id' => 'required|exists:place,id',
                'com_rating' => 'required|integer|min:1|max:5',
                //  'com_title' => 'required|string|min:1|max:255',
                'com_text' => 'required|string|min:1|max:255',
            ],
            [
                'user_id.required' => 'The user id is required',
                'user_id.exists' => 'The user id must exist in the user table',

                'plc_id.required' => 'The place id is required',
                'plc_id.exists' => 'The place id must exist in the place table',

                'com_rating.required' => 'The comment rating is required',
                'com_rating.integer' => 'The comment rating must be an integer',
                'com_rating.min' => 'The comment rating must be at least 1',
                'com_rating.max' => 'The comment rating must be at most 5',

                // 'com_title.required' => 'The comment title is required',
                // 'com_title.string' => 'The comment title must be a string',
                // 'com_title.min' => 'The comment title must be at least 1 character',
                // 'com_title.max' => 'The comment title must be at most 255 characters',

                'com_text.required' => 'The comment text is required',
                'com_text.string' => 'The comment text must be a string',
                'com_text.min' => 'The comment text must be at least 1 character',
                'com_text.max' => 'The comment text must be at most 255 characters',
            ]
        );
    }

    /**
     * Function called by ???.vue when the form is submitted to insert with the route: /comment/add (post)
     * Adds a comment to the database
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_comment(Request $request){
        $comment=Comment::create([
            'user_id' => $request->user_id,
            'user_pseudo' =>  $request->user_pseudo,
            'plc_id' => $request->plc_id,
            'com_rating' => $request->com_rating,
            // 'com_title' => $request->com_title,
            'com_text' => $request->com_text,
        ]);
        // update Place table
        $this->update_placeRating($request->plc_id);
        //$com_id = $comment->id;
        //return response()->json([
          //  'com_id' => $ $com_id,
        //]);
    }

    /**
     * Function called by ???.vue with the route : /comment/rated/{id} (get)
     * Get all the comments of the user connected
     * The id parameter corresponds to the id of the user connected 
     * @param int $id the id of the user connected
     * @return \Illuminate\Http\Response
     */
    public function send_rated($id){
        $comments = Comment::where('user_id', $id)->get();
        $array = [];
        foreach($comments as $comment){
            $obj = [
                'user_id' => $comment->user_id,
                'user_pseudo' => $comment->user_pseudo,
                'plc_id' => $comment->plc_id,
                'com_rating' => $comment->com_rating,
                // 'com_title' => $comment->com_title,
                'com_text' => $comment->com_text,
                'com_date' => $comment->created_at,
            ];
            array_push($array, $obj);
        }
        return response()->json($array);
    }


    /**
     * Function called by ???.vue with the route : /comment/place/{id} (get)
     * Get all the comments of a place
     * The id parameter corresponds to the id of the place 
     * @param int $id the id of the place
     * @return \Illuminate\Http\Response
     */
    public function send_placeComments($id){
        $comments = Comment::where('plc_id', $id)->get();
        $array = [];
        foreach($comments as $comment){
            $obj = [
                'user_id' => $comment->user_id,
                'user_pseudo' => $comment->user_pseudo,
                'plc_id' => $comment->plc_id,
                'com_rating' => $comment->com_rating,
                // 'com_title' => $comment->com_title,
                'com_text' => $comment->com_text,
                'com_date' => $comment->created_at,
            ];
            array_push($array, $obj);
        }
        return response()->json($array);
    }
    

    /**
     * Function called by ???.vue with the route : /comment/all (get)
     * Get all the comments
     * @return \Illuminate\Http\Response
     */
    public function send_comments(){
        $comments = Comment::all();
        $array = [];
        foreach($comments as $comment){
            $obj = [
                'user_id' => $comment->user_id,
                'user_pseudo' => $comment->user_pseudo,
                'plc_id' => $comment->plc_id,
                'com_rating' => $comment->com_rating,
                // 'com_title' => $comment->com_title,
                'com_text' => $comment->com_text,
                'com_date' => $comment->created_at,
            ];
            array_push($array, $obj);
        }
        return response()->json($array);
    }

    /**
     * Function called by Example???.vue when we want to delete a comment with the route : /comment/delete (post)
     * Delete a comment thanks to the id given in parameter
     * @param int $id the id of the comment we want to delete
     */
    public function delete_comment(Request $request, $id){
        $comment = Comment::findOrFail($id);
        $comment->delete();
        // update Place table
        $this->update_placeRating($request->plc_id);
    }

    /**
     * Function called by ???.vue when we want the average rating of a place with the route : /comment/average/{id} (get)
     * Get the average rating of a place thanks to the id given in parameter
     * @param int $id the id of the place we want the average rating
     * @return \Illuminate\Http\Response the average rating, or a null response if there is no comment 
     */
    public function average_rating($id){
        $comments = Comment::where('plc_id', $id)->get();
        if (count($comments) == 0){
            $average = null;
        } else {
            $average = 0;
            foreach($comments as $comment){
                $average += $comment->com_rating;
            }
            $average = $average / count($comments);
        }
        return response()->json($average);

    }

    /**
     * Function called by other functions in this file every time the Comments table is updated
     * Notifies the Places table and calls the right function in PlaneController
     * @param int $id the id of the place to update
     */
    private function update_placeRating($id){
        $comments = Comment::where('plc_id', $id)->get();
        if (count($comments) == 0){
            $average = null;
        } else {
            $average = 0;
            foreach($comments as $comment){
                $average += $comment->com_rating;
            }
            $average = $average / count($comments);
        }
        PlaceController::update_rating($id, $average);
    }
}
