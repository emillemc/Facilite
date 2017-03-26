<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        // Busca user pelo id do user logado
        $user = User::where('id', Auth::user()->id)->get()->first();
        $userName = $user->name;
        $userEmail = $user->email;
        // Busca prof (contém user, categorias, serviços e especialidades) pelo id do userProf logado
        $prof = Professional::where('user_id', $user->id)->get()->first();
        // Se for encontrado profissional cadastrado anteriormente, exibe as informações
        if($prof){
            $profRole = $prof->user->role;
            $profName = $prof->user->name;
            $profEmail = $prof->user->email;
            $profCpf = $prof->cpf;
            $profTel = $prof->tel;
        }

        // Retorna a view com os campos preenchidos
        return view('account.editar-conta', compact('userName', 'userEmail', 'profRole', 'profName', 'profEmail', 'profCpf', 'profTel'));
    }

    public function postEditarContaUser(Request $request)
    { 
        $dataForm = $request->all();
        // Verifica checkbox 'Sou Profissional' marcado = prof, desmarcado = user
        $dataForm['role'] = ( !isset($dataForm['role']) ) ? 'user' : 'prof';
        // Guarda valor do checkbox (user ou prof)
        $role = $dataForm['role'];

        // Se o checkbox estiver marcado
        if($role == 'prof'){

            // Busca o prof, caso já tenha sido cadastrado como prof anteriormente
            $prof = Professional::where('user_id', Auth::user()->id)->get()->first();

            // Se exisitr o prof
            if($prof){

                // Busca usuário
                $user = User::where('id', Auth::user()->id)->get()->first();

                // Atualiza as informações e o 'role' do usuário para 'prof'
                $update = $user->update([
                    'name' => $dataForm['name'],
                    'role' => 'prof',
                ]);

                // Se atualizou
                if($update){

                    // Verifica se o prof tem perfil previamente configurado
                    if($prof->url_perfil){

                        // Atualiza o 'status' do profissional para 'active'
                        $updateStatus = $prof->update([
                            'status' => 'active',
                        ]);

                        // Retorna o perfil do profissional
                        return redirect()->route('my-profile');

                    // Se não, retorna editar-perfil
                    }else{
                        return redirect()->route('editar-perfil')->withErrors('Informe um endereço para o seu perfil!');
                    }

                // Se não atualizou os dados
                }else{
                    return redirect()->back()->withErrors('Deu Merda!');
                }

            // Se não existir o prof
            }else{

                $user = User::where('id', Auth::user()->id)->get()->first();
                $update = $user->update($dataForm);
                // Insere na base de dados, na tabela prof os campos profissionais
                $insertProf = Professional::create([
                    'user_id'   => $user->id,
                    'cpf'       => $dataForm['cpf'],
                    'tel'       => $dataForm['tel'],
                ]);

                if($insertProf){
                    return redirect()->route('editar-perfil');
                }else{
                    return redirect()->route('home');
                }
            }

        // Se o checkbox não estiver marcado
        }else{

            $user = User::where('id', Auth::user()->id)->get()->first();
            $update = $user->update($dataForm);

            if($update){
                return redirect()->route('editar-conta');
            }else{
                return redirect()->back()->withErrors('Deu merda!');
            }

        }

    }

    public function postEditarContaProf(Request $request)
    {
        $dataForm = $request->all();
        // Verifica checkbox 'Sou Profissional' marcado = prof, desmarcado = user
        $dataForm['role'] = ( !isset($dataForm['role']) ) ? 'user' : 'prof';
        // Guarda valor do checkbox (user ou prof)
        $role = $dataForm['role'];

        // Se o checkbox estiver marcado
        if($role == 'prof'){

            // Busca usuário para fazer alterações (como nome e etc...)
            $user = User::where('id', Auth::user()->id)->get()->first();
            $prof = Professional::where('user_id', $user->id)->get()->first();

            $update = $user->update($dataForm);

            if($update){
                return redirect()->route('editar-conta');
            }else{
                return redirect()->route('home');
            }
        }else{
            // Busca usuário
            $user = User::where('id', Auth::user()->id)->get()->first();
            $prof = Professional::where('user_id', $user->id)->get()->first();

            // Atualiza o 'status' do profissional para 'inactive'
            $updateStatus = $prof->update([
                'status' => 'inactive',
            ]);

            // Atualiza os dados do profissional
            $update = $user->update([
                'name' => $dataForm['name'],
                'role' => 'user',
            ]);

            if($update){
                return redirect()->route('home');
            }else{
                return redirect()->back()->withErrors('Deu merda');
            }
        }
    }
}