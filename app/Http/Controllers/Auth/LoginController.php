<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    	return view('autenticacao.login');
    }

    public function postLogin(LoginFormRequest $request)
    {
        // $email = $request->email;
        // $password = $request->password;

        // if (Hash::needsRehash($dataForm['password'])) {
        //     $dataForm['password'] = Hash::make($dataForm['password']);
        // }

        // if (Hash::check($password, $hashedPassword)) {
        //     // The passwords match...
        // }

        // $hashed = Hash::make($dataForm['password']);
        // $dataForm['password'] = $hashed;

        // $email = $dataForm['email'];
        // $password = $dataForm['password'];

        $dataForm = $request->only(['email', 'password']);
        // return dd($dataForm);

        if (Auth::attempt($dataForm, true)) {
            // Dados corretos: faz o login e redireciona para '/'
            // return dd($dataForm);
            return redirect('/');
        } else {
            // Dados incorretos: retorna para a page de login informando os erros (LoginFormRequest)
            // return dd($dataForm);
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}