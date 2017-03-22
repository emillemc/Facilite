<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Professional;
use App\Http\Requests\Auth\RegisterFormRequest;

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

    public function postEditarConta(RegisterFormRequest $request)
    {

        // // Pega os dados vindo do formulário
        // $dataForm = $request->all();
        // // Se checkbox estiver marcado = prof, senão = user
        // $dataForm['role'] = ( !isset($dataForm['role']) ) ? 'user' : 'prof';
        // // Guarda valor do checkbox (user ou prof)
        // $role = $dataForm['role'];
        // // Verifica e cria hash do password
        // if (Hash::needsRehash($dataForm['password'])) {
        //     $dataForm['password'] = Hash::make($dataForm['password']);
        // }

        // switch($role){
        //     case "prof":
        //         $user = User::where('id', Auth::user()->id)->get()->first();
        //         $prof = Professional::where('user_id', $user->id)->get()->first();
        //         // Insere na base de dados, na tabela users os dados editados do user
        //         $updateUser = $user->update($dataForm);
        //         if(isset($prof)){
        //             // // Atualiza na base de dados, na tabela prof, os dados editados do prof
        //             $updateProf = $prof->update([
        //             'user_id'   => $updateUser->id,
        //             'cpf'       => $dataForm['cpf'],
        //             'tel'       => $dataForm['tel'],
        //             ]);
        //         }else{
        //             Auth::logout();
        //             // Insere na base de dados, na tabela prof os dados do prof
        //             $updateProf = Professional::create([
        //             'user_id'   => $updateUser->id,
        //             'cpf'       => $dataForm['cpf'],
        //             'tel'       => $dataForm['tel'], 
        //             ]);

        //             Auth::login($updateProf, true);
        //         }
                
        //         // Verifica se inseriu/atualizou com sucesso
        //         if($updateProf){
        //             // Page editar-conta com os novos dados cadastrados
        //             return redirect()->route('editar-conta');
        //         }else{
        //             // Caso haja erro na inserção, volta para a page editar-conta informando os erros
        //             return redirect()->back();
        //         }
        //     break;

        //     default:
        //         $user = User::where('id', Auth::user()->id)->get()->first();
        //         // Insere na base de dados, na tabela users
        //         $updateUser = $user->update($dataForm);
        //         // Verifica se editou com sucesso
        //         if($updateUser){
        //             // Redireciona para a page home
        //             return redirect()->route('editar-conta');
        //         }else{
        //             // Caso haja erro na inserção, volta para a page editar-conta informando os erros
        //             return redirect()->back();
        //         }
        // }




    	// if(Auth::user()->role == 'prof'){
     //        $dataForm = $request->all();

     //        if(Hash::needsRehash($dataForm['password'])) {
     //            $dataForm['password'] = Hash::make($dataForm['password']);
     //        }

     //        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
     //        $update = $prof->update($dataForm);
         
     //        if($update){
     //          return redirect()->route('editar-conta');
     //        }else{
     //          return redirect()->route('home');
     //        }

     //    }else{
     //        $dataForm = $request->all();

     //        if(Hash::needsRehash($dataForm['password'])) {
     //            $dataForm['password'] = Hash::make($dataForm['password']);
     //        }

     //        $user = User::where('id', Auth::user()->id)->get()->first();
     //        $update = $user->update($dataForm);

     //        if($update){
     //            return redirect()->route('editar-conta');
     //        }else{
     //            return redirect()->route('home');
     //        }
     //    }

    }
}