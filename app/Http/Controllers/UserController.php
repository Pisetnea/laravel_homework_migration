<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view("user");
    }

    public function show($id){
        return "User ID is: " . $id;
    }

    public function getUsernameEmail($name, $email){
        return "User Name is: " . $name . " and Email is: " . $email;
    }
}
