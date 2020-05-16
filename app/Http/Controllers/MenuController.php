<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MenuController extends Controller
{

    public function __construct(){
        $this->middleware('auth:administrador');
    }

    public function getVistaMenu(){
        return view('menu');
    }


}
