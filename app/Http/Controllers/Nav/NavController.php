<?php

namespace App\Http\Controllers\Nav;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class NavController extends Controller
{
    public function nav(){
        $users = User::get();
        return view('include.author_left_nav' , compact('users'));
    }
}
