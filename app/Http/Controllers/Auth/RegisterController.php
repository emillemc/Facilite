<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // <- Necessário para verificar e Logar o usuário após o cadastro
use Illuminate\Support\Facades\Hash; // <- Encryptar password no cadastro
use App\User; // <- Classe de Usuario
use App\Models\Categoria;
use App\Http\Requests\Auth\RegisterFormRequest; // <- Classe de regras e mensagens de validação de Cadastro

class RegisterController extends Controller
{
    public function __construct()
    {
        // Middleware 'guest': Se tiver sessão ativa redireciona para '/' e não mostra a page de cadastro
    	$this->middleware('guest')->only('index');
    }

    public function index()
    {
    	return view('auth.cadastrar');
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
                    return redirect()->route('cadastrar-categorias');
                    break;

                default:
                    return redirect()->route('home');
            }
        }else{
            return redirect()->back();
        }
    }

    public function cadastrarCategorias(Categoria $categoria)
    {
        $this->categoria = $categoria;

        $categorias = $this->categoria->all();

    	return view('auth.cadastrar-categorias', compact('categorias'));
    }

    public function postCadastrarCategorias()
    {
    	//
    }

}
