<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Professional;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // <- Necessário importar a facade Auth para verificar os dados do Login
use App\Http\Requests\Auth\LoginFormRequest; // <- Classe de regras e mensagens de validação de login

class LoginController extends Controller
{
    public function __construct()
    {        
        // Se tiver sessão ativa redireciona para '/' e não mostra a page de login
    	$this->middleware('guest')->except('logout');

    }

    public function index()
    {
    	// return "test";
    }

    public function login()
    {
    	return view('auth.login');
    }

    public function postLogin(LoginFormRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if ( Auth::attempt($credentials) ) {
                // Dados corretos: faz o login e redireciona para '/'
                return redirect()->route('home');
            } else {
                // Dados incorretos: retorna para a page de login informando os erros (LoginFormRequest)
                return redirect()->back();
            }
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}