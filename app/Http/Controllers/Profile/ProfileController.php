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
        $userProfessional = User::find(Auth::user()->id);
        $profName = $userProfessional['name'];
        $profEmail = $userProfessional['email'];

        // Busca profissional logado (tabela professional)
        $professional = Professional::find(Auth::user()->id);
        $profTel = $professional['tel'];
        $proflCpf = $professional['cpf'];

        // Busca Serviços
        $profServicos = User::distinct()->select('servicos.name')
            ->join('professionals', 'professionals.user_id', '=', 'users.id')
            ->join('especialidade_professional', 'especialidade_professional.professional_id', '=', 'professionals.id')
            ->join('especialidades', 'especialidades.id', '=', 'especialidade_professional.especialidade_id')
            ->join('servicos', 'servicos.id', '=', 'especialidades.servico_id')
            ->where('users.id', '=', Auth::user()->id)
            ->groupBy('servicos.name')
            ->get();

        // Busca Especialidades
        $profEspecialidades = User::distinct()->select('especialidades.name')
            ->join('professionals', 'professionals.user_id', '=', 'users.id')
            ->join('especialidade_professional', 'especialidade_professional.professional_id', '=', 'professionals.id')
            ->join('especialidades', 'especialidades.id', '=', 'especialidade_professional.especialidade_id')
            ->join('servicos', 'servicos.id', '=', 'especialidades.servico_id')
            ->where('users.id', '=', Auth::user()->id)
            ->groupBy('especialidades.name')
            ->get();

        return view('profile.perfil-profissional', compact('profName', 'profTel', 'profServicos', 'profEspecialidades'));
    }

    public function editarPerfil()
    {
        return "Editar Perfil";
    }

    public function postEditarPerfil()
    {
        //
    }


    public function editarEspecialidades()
    {
        $categorias = Categoria::get();

        return view('profile.editar-categorias-especialidades', compact('categorias'));
    }

    public function postEditarEspecialidades(Request $request)
    {
        // Pega os checkbox's marcados, exceto o token
        $especialidades = $request->except(['_token']);
        // dd($especialidades);

        // Busca id do prof = id do prof logado
        $profissional = Professional::where('user_id', Auth::user()->id)->get()->first();
        // dd($profissional);

        // Atualiza as especialidades escolhidas e salva no banco de dados
        $insert = $profissional->especialidades()->sync($especialidades);

        if($insert){
            return redirect()->route('editar-perfil');
        }else{
            return redirect()->back()->withErrors('Erro ao atualizar dados.');
        }

    }


    // public function editarCategorias()
    // {
    // 	$categorias = Categoria::get();

    // 	return view('profile.editar-categorias', compact('categorias'));
    // }

    // public function postEditarCategorias(Request $request)
    // {
    //     // Pega os checkbox's marcados, exceto o token
    //     $categorias = $request->except(['_token']);
    //     // Verifica categorias >=1 e <=3
    //     if( count($categorias) >= 1 && count($categorias) <= 3 ){
    //         // Busca id do prof = id do prof logado
    //         $profissional = Professional::where('user_id', Auth::user()->id)->get()->first();
    //         // Atualiza as categorias escolhidas e salva no banco de dados
    //         $insert = $profissional->categorias()->sync($categorias);

    //         if($insert){
    //             return redirect()->route('editar-servicos');
    //         }else{
    //             return redirect()->back()->withErrors('Erro ao atualizar dados.');
    //         }
    //     }else{
    //         return redirect()->back()->withErrors('(Selecione no mínimo 1 e no máximo 3 categorias)');
    //     }
        

    // }

    // public function editarServicos()
    // {
    //     // Exemplo listando tudo do banco:
        
    //     $categorias = Categoria::where('name', 'LIKE', "%a%")->get();

    //     foreach($categorias as $categoria){
    //         echo "<b>{$categoria->name}</b><br>";

    //         // Retorna todos os servicos correspondentes as categorias
    //         $servicos = $categoria->servicos()->get();

    //         // Percorre e lista os Estados
    //         foreach ($servicos as $servico) {
    //             echo "<br>{$servico->name}.";

    //          }

    //          echo "<hr>";
    //     }



        // $categorias = $this->categoria
        //     ->join('categoria_professional', 'categorias.id', '=', 'categoria_professional.categoria_id')
        //     ->join('professionals', 'professionals.id', '=', 'categoria_professional.professional_id')
        //     ->join('users', 'users.id', '=', 'professionals.user_id')
        //     ->select('categorias.name')
        //     ->where('users.id', '=', Auth::user()->id)
        //     ->orderBy('categorias.name')
        //     ->get();
        // dd($categorias);

        // $categorias = $this->categoria
        //     ->join('servicos', 'categorias.id', '=', 'servicos.categoria_id')
        //     ->join('servico_professional', 'servicos.id', '=', 'servico_professional.servico_id')
        //     ->join('categoria_professional', 'categorias.id', '=', 'categoria_professional.categoria_id')
        //     ->join('professionals', 'professionals.id', '=', 'categoria_professional.professional_id')
        //     ->join('users', 'users.id', '=', 'professionals.user_id')
        //     ->select('categorias.name', 'servicos.name')
        //     ->where('users.id', '=', Auth::user()->id)
        //     ->orderBy('categorias.name')
        //     ->get();


        // foreach ($categorias as $categoria){
        //     echo "<b>{$categoria->name}</b><br>";

        //     // $servicos = $categoria->servicos()->get();

        //     foreach ($servicos as $servico) {
        //         echo "<br>{$servico->name}.";
        //      }

        //      echo "<hr>";
        // }

        // $categorias = DB::table('categorias')
        //     ->join('categoria_professional', 'categorias.id', '=', 'categoria_professional.categoria_id')
        //     ->join('professionals', 'professionals.id', '=', 'categoria_professional.professional_id')
        //     ->join('users', 'users.id', '=', 'professionals.user_id')
        //     ->select('categorias.name')
        //     ->where('users.id', '=', Auth::user()->id)
        //     ->orderBy('categorias.name')
        //     ->get();

        // dd($categorias);
        

        // Busca categorias cadastradas do profissional logado
        // $categorias = DB::table('categorias')
        //     ->join('categoria_professional', 'categorias.id', '=', 'categoria_professional.categoria_id')
        //     ->join('professionals', 'professionals.id', '=', 'categoria_professional.professional_id')
        //     ->join('users', 'users.id', '=', 'professionals.user_id')
        //     ->select('categorias.name')
        //     ->where('users.id', '=', Auth::user()->id)
        //     ->orderBy('categorias.name')
        //     ->get();

        // PESQUISA TA OK \/ *********************************************************************
        // $servicos = DB::table('servicos')
            // ->join('categorias', 'categorias.id', '=', 'servicos.categoria_id')
            // ->join('categoria_professional', 'categorias.id', '=', 'categoria_professional.categoria_id')
            // ->join('professionals', 'professionals.id', '=', 'categoria_professional.professional_id')
            // ->join('users', 'users.id', '=', 'professionals.user_id')
            // ->select('categorias.name', 'servicos.name')
            // ->where('users.id', '=', Auth::user()->id)
            // ->orderBy('categorias.name')
            // ->get();

        // dd($servicos);

        // ***************************************************************************************

        // return view('profile.editar-servicos', compact('categorias'));
        
    // }

    // public function editarEspecialidades()
    // {
    //     return "Editar Especialidades";
    // }

    // public function postEditarEspecialidades()
    // {
    //     //
    // }

}
