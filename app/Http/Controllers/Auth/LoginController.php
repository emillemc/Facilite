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
    	return view('auth.login');
    }

    /**
     * Verifica credenciais e efetua login
     * @param  Request $request (Dados form login)
     * @return Boolean | True: Login efetuado com sucesso. False: Login inválido.
     */
    public function postLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            return redirect()->intended();
        } else {
            return redirect()->route('login')->withErrors('Email ou senha incorretos!');
        }
        
    }

    /**
     * Efetua logout
     * @return redirect() | Deslogia e redireciona o usuário para 'home'
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}