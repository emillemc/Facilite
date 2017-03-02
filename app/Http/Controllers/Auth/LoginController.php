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
        // Middleware 'guest': Se tiver sessão ativa redireciona para '/' e não mostra a page de login
    	$this->middleware('guest')->only('login');

    }

    public function index()
    {
    	// return "test";
    }

    public function login()
    {
    	return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        $prof = Professional::where('email', $credentials['email'])->first();

        // Se for email profissional
        if( $prof ) {

            // Loga como profissional
            if( Auth::guard('prof')->attempt($credentials) ) {

                // Dados corretos: faz o login e redireciona para '/'
                return redirect()->route('home');

            }else{

                // Dados incorretos: retorna para a page de login informando os erros (LoginFormRequest)
                return redirect()->back()->withErrors('Email ou senha incorretos!');
            }

        // Se não for email profissional
        }else{

            // Loga como usuário comum
            if ( Auth::attempt($credentials) ) {

                // Dados corretos: faz o login e redireciona para '/'
                return redirect()->route('home');

            } else {

                // Dados incorretos: retorna para a page de login informando os erros (LoginFormRequest)
                return redirect()->back()->withErrors('Email ou senha incorretos!');
            }

        }

        // // if ( auth()->guard('prof')->attempt($dataForm) ) {
        // if ( auth()->attempt($dataForm) ) {
        //     // Dados corretos: faz o login e redireciona para '/'
        //     return redirect()->route('home');
        // } else {
        //     // Dados incorretos: retorna para a page de login informando os erros (LoginFormRequest)
        //     return redirect()->back();
        // }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}