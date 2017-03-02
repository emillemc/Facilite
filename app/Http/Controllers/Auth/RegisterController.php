<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Professional; 
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth; // <- Necessário para verificar e Logar o usuário após o cadastro
use Illuminate\Support\Facades\Hash; // <- Encryptar password no cadastro
use App\Http\Requests\Auth\RegisterFormRequest; // <- Classe de regras e mensagens de validação de Cadastro

class RegisterController extends Controller
{
    public function __construct()
    {
        // Middleware 'guest': Se tiver sessão ativa redireciona para '/' e não mostra a page de cadastro
    	$this->middleware('guest')->only('index');
        // $this->middleware('auth:prof')->only('cadastrarCategorias');
        // $this->middleware('prof')->only('cadastrarCategorias');

    }

    public function index()
    {
    	return view('auth.cadastrar');
    }

    public function postCadastrar(RegisterFormRequest $request, User $user, Professional $professional)
    {   
        // Cria instância de User e Professional
        $this->user = $user;
        $this->professional = $professional;

        // Pega todos os dados vindo do formulário
        $dataForm = $request->all();

        // Se checkbox estiver marcado = true, senão = false
        $dataForm['is_prof'] = ( !isset($dataForm['is_prof']) ) ? 'false' : 'true';

        // Guarda valor do checkbox
        $isProf = $dataForm['is_prof'];

        // Verifica e cria hash do password
        if (Hash::needsRehash($dataForm['password'])) {
            $dataForm['password'] = Hash::make($dataForm['password']);
        }

        switch($isProf){
            case "true":
                // Insere na base de dados, na tabela professional
                $insertProf = $professional->create($dataForm);
                // Loga o profissional após cadastrar
                $loginProf = auth()->guard('prof')->login($insertProf);
                // Verifica se inseriu com sucesso
                if($insertProf){
                    // se inseriu, redireciona para a page cadastrar-categorias (continua cadastro)
                    return redirect()->route('cadastrar-categorias');
                }else{
                    // Caso haja erro na inserção, volta para a page cadastro informando os erros
                    return redirect()->back();
                }
            break;

            default:
                // Insere na base de dados, na tabela users
                $insertUser = $user->create($dataForm);
                // Loga o usuário após cadastrar
                $loginUser = Auth::login($insertUser, true);
                // Verifica se inseriu com sucesso
                if($insertUser){
                    // Redireciona para a page home
                    return redirect()->route('home');
                }else{
                    // Caso haja erro na inserção, volta para a page cadastro informando os erros
                    return redirect()->back();
                }
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
