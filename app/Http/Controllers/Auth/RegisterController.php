<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Professional;
use Illuminate\Support\Facades\Auth; // <- Necessário para verificar e Logar o usuário após o cadastro
use Illuminate\Support\Facades\Hash; // <- Encryptar password no cadastro
use App\Http\Requests\Auth\RegisterFormRequest; // <- Classe de regras e mensagens de validação de Cadastro

class RegisterController extends Controller
{
    public function __construct()
    {
        // Se tiver sessão ativa redireciona para '/' e não mostra a page de cadastro
    	$this->middleware('guest');

    }

    public function index()
    {
    	return view('auth.cadastrar');
    }

    public function postCadastrar(RegisterFormRequest $request)
    {   
        // Pega os dados vindo do formulário
        $dataForm = $request->all();
        // Se checkbox estiver marcado = prof, senão = user
        $dataForm['role'] = ( !isset($dataForm['role']) ) ? 'user' : 'prof';
        // Guarda valor do checkbox (permissão user ou prof)
        $role = $dataForm['role'];
        // Verifica e cria hash do password
        if (Hash::needsRehash($dataForm['password'])) {
            $dataForm['password'] = Hash::make($dataForm['password']);
        }
        switch ($role) {
            case "prof":
                // Insere na base de dados, na tabela users os dados de login
                $insertUser = User::create($dataForm);
                // Insere na base de dados, na tabela prof os campos profissionais
                $insertProf = Professional::create([
                    'user_id'   => $insertUser->id,
                    'cpf'       => $dataForm['cpf'],
                    'tel'       => $dataForm['tel'],
                ]);
                // Loga o usuário após cadastrar
                $login = Auth::login($insertUser, true);
                // Verifica se inseriu com sucesso
                if ($insertProf) {
                    // Redireciona para a page Cadastrar/Editar Especialidades
                    return redirect()->route('editar-categorias');
                } else {
                    // Caso haja erro na inserção, volta para a page cadastro informando os erros
                    return redirect()->back();
                }
                break;
            default:
                // Insere na base de dados, na tabela users
                $insert = User::create($dataForm);
                // Loga o usuário após cadastrar
                $login = Auth::login($insert, true);
                // Verifica se inseriu com sucesso
                if ($insert) {
                    // Redireciona para a page home
                    return redirect()->route('home');
                } else {
                    // Caso haja erro na inserção, volta para a page cadastro informando os erros
                    return redirect()->back();
                }
        }

    }


}