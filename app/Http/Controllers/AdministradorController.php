<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Administrador;
use Auth;

class AdministradorController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/menu';

    public function __construct(){
        $this->middleware('guest')->except('logoutAdmin');
        $this->middleware('guest:administrador')->except('logoutAdmin');
    }

    public function getVistaLogin(){

        return view('login');
    }

    public function logearAdmin(){

        $credentials=$this->validate(request(),
        ['email'=>'email|required|string',
        'password'=>'required|string']);

        if (Auth::guard('administrador')->attempt($credentials)){ 
            return redirect()->intended('/menu');
        }
        return back()
        ->withErrors(['email'=>'Estas credenciales no concuerdan con nuestros registros.'])
        ->withInput(request(['email']));
    }


    public function logoutAdmin(){
        Auth::guard('administrador')->logout();
        return redirect('/');
    }
}
