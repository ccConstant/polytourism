<?php

/*
* Filename: UserController.php
* Creation date: 4 Dec 2023
* Update date: 4 Dec 2023
* This file is used to link the view files and the database that concern the Users table.
* For example: Display, update or delete the user's profile form
*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Function called by ???.vue with the route: /users (post)
     * Send all users to the view
     * @return \Illuminate\Http\Response
     */
    public function send_users(){
        $users = User::all();
        return $users;
    }

    /**
     * Function called by ???.vue with the route: /users/setRoleToAdmin/{id} (post)
     * Set the role of the user to admin
     * @param int $id : id of the user
     */
    public function setRoleToAdmin($id){
        $user = User::find($id);
        $user->update(['role' => 'admin']);
    }

    /**
     * Function called by ???.vue with the route: /users/setRoleToUser/{id} (post)
     * Set the role of the user to user
     * @param int $id : id of the user
     */
    public function setRoleToUser($id){
        $user = User::find($id);
        $user->update(['role' => 'user']);
    }

    /**
     * Function called by ???.vue with the route: /user/delete/{id} (post)
     * Delete the user
     * @param int $id : id of the user we want to delete
     */
    public function delete($id){
        $user = User::find($id);
        $user->delete();
    }
}
