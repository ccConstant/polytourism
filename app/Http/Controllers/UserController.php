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
    public function send_users(){
        $users = User::all();
        return $users;
    }

    public function setRoleToAdmin($id){
        $user = User::find($id);
        $user->update(['role' => 'admin']);
        return $user;
    }

    public function setRoleToUser($id){
        $user = User::find($id);
        $user->update(['role' => 'user']);
        return $user;
    }
}
