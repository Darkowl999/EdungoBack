<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Categoria;

class ApiCategoriaController extends Controller
{
    public function __construct(){
      //  $this->middleware('auth');
    }

    public function index(){
        return Categoria::all();
    }

}
