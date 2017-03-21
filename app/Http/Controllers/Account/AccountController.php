<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Professional;

class AccountController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * Editar Conta
     * @return [view] [campos preenchidos]
     */
    public function index()
    {   
        // Se quem estiver logado for profissional
        if(Auth::user()->role == 'prof'){
            // Busca prof (contém user, categorias, serviços e especialidades) pelo id do userProf logado
            $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
            $profRole = $prof->user->role;
            $profName = $prof->user->name;
            $profEmail = $prof->user->email;
            $profCpf = $prof->cpf;
            $profTel = $prof->tel;
            // Retorna a view com os campos do profissional preenchidos
            return view('account.editar-conta', compact('profRole', 'profName', 'profEmail', 'profCpf', 'profTel'));

        }else{
            // Busca user pelo id do user logado
            $user = User::where('id', Auth::user()->id)->get()->first();
            $userName = $user->name;
            $userEmail = $user->email;
            // Retorna a view com os campos do user preenchidos
            return view('account.editar-conta', compact('userName', 'userEmail'));
        }
        
        

    }

    public function postEditarConta(Request $request)
    {
    	return "Editando conta...";
    }
}
