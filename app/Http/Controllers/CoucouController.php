<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoucouController extends Controller
{
    public function cc(){
        return view('coucou');
    }
}
