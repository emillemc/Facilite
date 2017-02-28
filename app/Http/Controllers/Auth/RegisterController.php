<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth; // <- Necessário importar a facade Auth para verificar Logar o usuário após o cadastro
use Illuminate\Support\Facades\Hash;
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

        // Se checkbox estiver marcado = true, senão = false
        $dataForm['is_prof'] = ( !isset($dataForm['is_prof']) ) ? 'false' : 'true';

        // Guarda is_prof
        $isProf = $dataForm['is_prof'];

        // Verifica e cria hash do password
        if (Hash::needsRehash($dataForm['password'])) {
            $dataForm['password'] = Hash::make($dataForm['password']);
        }

        // Insere na base de Dados
        $insert = $user->create($dataForm);

        // Loga o usuários após cadastrar
        $login = Auth::login($insert, true);

        /* Se inseriu... Verifica se é profissional | Se não inseriu volta pro form e exibe os erros */
        if($insert){

            switch($isProf){
                case "true":
                    // Proximas etapas do cadastro profissional aqui 
                    return "É profissional!";
                    break;

                default:
                    return redirect('/');
            }
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
