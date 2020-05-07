<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrador;

class AdministradorController extends Controller
{
    public function logearAdmin(Request $request){
        
        $email=$request->email;
        $password=$request->password;
        $administrador=Administrador::select('*')->where([ ['email','=',$email],['password','=',$password]])->first();
        if ($administrador!=null){
            return redirect('/menu');
        }
        return redirect('/');
    }
}
