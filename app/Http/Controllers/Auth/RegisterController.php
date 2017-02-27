<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User; // <- Classe de Usuario
use App\Http\Requests\Auth\RegisterFormRequest; // <- Classe de regras e mensagens de validação de Cadastro

class RegisterController extends Controller
{
    public function __construct()
    {
        // Middleware 'guest': Se tiver sessão ativa redireciona para '/' e não mostra a page de cadastro
    	$this->middleware('guest')->only('cadastrar');
    }

    public function index()
    {
    	// return "test";
    }

    public function cadastrar()
    {
        return view('autenticacao.cadastrar');
    }

    public function postCadastrar(RegisterFormRequest $request, User $user)
    {   
        // Cria instância de User
        $this->user = $user;

        // Pega todos os dados vindo do formulário
        $dataForm = $request->all();

        // Se checkbox estiver marcado = 1, senão = 0
        $dataForm['is_prof'] = ( !isset($dataForm['is_prof']) ) ? 'false' : 'true';

        // return dd($dataForm);

        // Insere na base de Dados
        $insert = $user->create($dataForm);

        // Se inseriu redireciona para /login, se não volta pro form e exibe os erros
        if($insert){
            return redirect()->route('login');
        }else{
            return redirect()->back();
        }
    }

    public function show($id)
    {
    	//
    }

    public function edit($id)
    {
    	//
    }

    public function update(Request $request, $id)
    {
    	//
    }

    public function destroy($id)
    {
        //
    }
}
