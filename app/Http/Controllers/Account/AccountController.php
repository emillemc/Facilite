<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Professional;
use App\Http\Requests\Account\UserEditFormRequest;
use App\Http\Requests\Account\ProfEditFormRequest;

class AccountController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * Editar Conta
     * @return view | Exibe view 'editar-conta' com os dados dos usuários (ou profissionais) preenchidos.
     */
    public function index()
    {   
        $user = User::find(Auth::user()->id);
        $prof = Professional::where('user_id', $user->id)->get()->first();
        return view('account.minha-conta', compact('user', 'prof'));
    }

    public function postEditarContaUser(UserEditFormRequest $request)
    { 
        $dataForm = $request->all();
        // Verifica checkbox 'Sou Profissional' marcado = prof, desmarcado = user
        $dataForm['role'] = ( !isset($dataForm['role']) ) ? 'user' : 'prof';
        // Guarda valor do checkbox (user ou prof)
        $role = $dataForm['role'];
        // Se o checkbox estiver marcado
        if ($role == 'prof') {
            // Busca o prof, caso já tenha sido cadastrado como prof anteriormente
            $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
            // Se exisitr o prof
            if ($prof) {
                // Busca usuário
                $user = User::where('id', Auth::user()->id)->get()->first();
                // Atualiza as informações e o 'role' do usuário para 'prof'
                $update = $user->update([
                    'name' => $dataForm['name'],
                    'email' => $dataForm['email'],
                    'role' => $role,
                ]);
                // Se atualizou
                if ($update) {
                    // Verifica se o prof tem perfil previamente configurado
                    if ($prof->url_perfil) {
                        // Atualiza o 'status' do profissional para 'active'
                        $updateStatus = $prof->update([
                            'status' => 'active',
                        ]);
                        // Retorna o perfil do profissional
                        return redirect()->route('editar-conta');
                    // Se não, retorna editar-perfil
                    } else {
                        return redirect()->route('editar-perfil')->withErrors('Informe um endereço para o seu perfil!');
                    }
                // Se não atualizou os dados
                } else {
                    return redirect()->back()->withErrors('Deu Merda!');
                }
            // Se não existir o prof
            } else {
                $user = User::where('id', Auth::user()->id)->get()->first();
                $update = $user->update($dataForm);
                // Insere na base de dados, na tabela prof os campos profissionais
                $insertProf = Professional::create([
                    'user_id'   => $user->id,
                    'cpf'       => $dataForm['cpf'],
                    'tel'       => $dataForm['tel'],
                ]);
                if ($insertProf) {
                    return redirect()->route('editar-perfil');
                } else {
                    return redirect()->route('home');
                }
            }
        // Se o checkbox não estiver marcado
        } else {
            $user = User::where('id', Auth::user()->id)->get()->first();
            $update = $user->update($dataForm);
            if ($update) {
                return redirect()->route('editar-conta');
            } else {
                return redirect()->back()->withErrors('Deu merda!');
            }
        }

    }

    public function postEditarContaProf(ProfEditFormRequest $request)
    {
        $dataForm = $request->all();
        // Verifica checkbox 'Sou Profissional' marcado = prof, desmarcado = user
        $dataForm['role'] = ( !isset($dataForm['role']) ) ? 'user' : 'prof';
        // Guarda valor do checkbox (user ou prof)
        $role = $dataForm['role'];
        // Se o checkbox estiver marcado, faz as devidas alterações
        if ($role == 'prof') {
            // Busca usuário para fazer alterações (como nome e etc...)
            $user = User::where('id', Auth::user()->id)->get()->first();
            // Busca profissional para fazer alterações (telefone, cps e etc...)
            $prof = Professional::where('user_id', $user->id)->get()->first();
            // Altera na tabela usuários
            $userUpdate = $user->update($dataForm);
            // Altera na tabela profissionais
            $profUpdate = $prof->update($dataForm);

            if($profUpdate){
                return redirect()->route('editar-conta');
            }else{
                return redirect()->back();
            }
        // Se o checkbox estiver desmarcado, prof vira user
        } else {
            // Busca user
            $user = User::where('id', Auth::user()->id)->get()->first();
            // Busca prof
            $prof = Professional::where('user_id', $user->id)->get()->first();
            // Atualiza o 'status' do profissional para 'inactive'
            $profUpdate = $prof->update([
                'status' => 'inactive',
            ]);
            // Atualiza os dados do profissional
            $userUpdate = $user->update([
                'name' => $dataForm['name'],
                'email' => $dataForm['email'],
                'role' => 'user',
            ]);
            if ($userUpdate) {
                return redirect()->route('editar-conta');
            } else {
                return redirect()->back();
            }
        }
    }

    public function alterarSenha()
    {
        return "test";
    }

    /**
     * Deleta conta do usuário permanentemente
     * @return redirect() | Redireciona para 'home'
     */
    public function deletarConta()
    {
        $user = User::find(Auth::user()->id);
        $user->delete();
        return redirect()->route('home');
    }
}