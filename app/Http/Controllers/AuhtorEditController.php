<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuhtorEditController extends Controller
{
    public function edit(){
        return view('authors_edit.edit');
    }
}
