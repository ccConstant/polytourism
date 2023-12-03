<?php
/*This base controller is designed to be a starting point for the application's controllers.
*When a new controller is created in the application, this base controller is typically extended to inherit its functionality.*/



namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
