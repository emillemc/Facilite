<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\Professional;
use App\Models\Categoria;
use App\Models\Servico;
use App\Models\Especialidade;

class ProfileController extends Controller
{
    public function __construct()
    {
        // Só acessa se estiver logado
    	$this->middleware('auth');
        // Só acessa profissionais
    	$this->middleware('role:prof');
    }

    // Perfil Profissional
    public function index()
    {
        // Busca usuário profissional logado (tabela user)
        $userProf = User::find(Auth::user()->id);
        // Busca prof (contém serviços e especialidades) pelo id do userProf logado
        $prof = Professional::where('user_id', $userProf->id)->get()->first();

        $profName = $userProf['name'];
        // $profEmail = $userProf['email'];
        // $profTel = $prof['tel'];

        /**
         * Arrumar forma de buscar pelo Eloquent
         */
        // foreach($prof->servicos as $servico){
        //     echo "{$servico->name}: <br>";
        //     /**
        //      * Transofrmar isso aqui em Busca Eloquent
        //      * [Busca especialidades cadastradas pelo profissional a partir do id do serviço]
        //      */
        //     $especialidades = Especialidade::select('especialidades.name')
        //         ->join('especialidade_professional', 'especialidades.id', '=', 'especialidade_professional.especialidade_id')
        //         ->join('servicos', 'servicos.id', '=', 'especialidades.servico_id')
        //         ->where('servico_id', $servico->id)
        //         ->get();

        //     foreach($especialidades as $especialidade){
        //         echo "{$especialidade->name} <br>";
        //     }
        //     echo "<hr>";
        // }       

        return view('profile.perfil-profissional', compact('prof', 'profName'));
    }

    public function editarPerfil()
    {
        return "Editar Perfil";
    }

    public function postEditarPerfil()
    {
        //
    }

    public function editarCategorias()
    {
    	$categorias = Categoria::get();

    	return view('profile.editar-categorias', compact('categorias'));
    }

    public function postEditarCategorias(Request $request)
    {
        // Pega os checkbox's marcados, exceto o token
        $categorias = $request->except(['_token']);
        // Verifica categorias >=1 e <=3
        if( count($categorias) >= 1 && count($categorias) <= 2 ){
            // Busca id do prof = id do prof logado
            $profissional = Professional::where('user_id', Auth::user()->id)->get()->first();
            // Atualiza as categorias escolhidas e salva no banco de dados
            $insert = $profissional->categorias()->sync($categorias);

            if($insert){
                return redirect()->route('editar-servicos');
            }else{
                return redirect()->back()->withErrors('Erro ao atualizar dados.');
            }
        }else{
            return redirect()->back()->withErrors('(Selecione no mínimo 1 e no máximo 2 categorias)');
        }
        

    }

    public function editarServicos()
    {
        // Busca profissional (contém categorias e serviços)
        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();        
        
        return view('profile.editar-servicos', compact('prof'));
        
    }

    public function postEditarServicos(Request $request)
    {
        // Pega os checkbox's marcados, exceto o token
        $servicos = $request->except(['_token']);
        // Verifica servicos >=1 e <=5
        if( count($servicos) >= 1 && count($servicos) <= 5 ){
            // Busca id do prof = id do prof logado
            $profissional = Professional::where('user_id', Auth::user()->id)->get()->first();
            // Atualiza os servicos escolhidos e salva no banco
            $insert = $profissional->servicos()->sync($servicos);

            if($insert){
                return redirect()->route('editar-especialidades');
            }else{
                return redirect()->back()->withErrors('Erro ao atualizar dados.');
            }
        }else{
            return redirect()->back()->withErrors('(Selecione no mínimo 1 e no máximo 5 serviços)');
        }
    }

    public function editarEspecialidades()
    {
        // Busca profissional (contém serviços e especialidades)
        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
        
        return view('profile.editar-especialidades', compact('prof'));
    }

    public function postEditarEspecialidades(Request $request)
    {
        // Pega os checkbox's marcados, exceto o token
        $especialidades = $request->except(['_token']);

        // Mínimo de 1 especialidade
        if( count($especialidades) >= 1 ){
            // Busca id do prof = id do prof logado
            $profissional = Professional::where('user_id', Auth::user()->id)->get()->first();
            // Atualiza as especialidades escolhidos e salva no banco
            $insert = $profissional->especialidades()->sync($especialidades);

            if($insert){
                return redirect()->route('editar-perfil');
            }else{
                return redirect()->back()->withErrors('Erro ao atualizar dados.');
            }
        }else{
            return redirect()->back()->withErrors('(Selecione pelo menos uma especialidade)');
        }
    }

}
