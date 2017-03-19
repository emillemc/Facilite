<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Professional;
use App\Models\Categoria;

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
        // Busca prof (contém user, categorias, serviços e especialidades) pelo id do userProf logado
        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Nome do profissional
        $name = $prof->user['name'];
        // Serviços cadastrados pelo profissional
        $servicos = $prof->servicos;
        // Especialidades cadastradas pelo profissional
        $especialidades = $prof->especialidades;       

        return view('profile.my-profile', compact('name', 'servicos', 'especialidades'));
    }

    public function editarCategorias()
    {   
        // Lista todas as categorias disponíveis
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
        // Busca prof (contém user, categorias, serviços e especialidades) pelo id do userProf logado
        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Categorias cadastradas pelo profissional
        $categorias = $prof->categorias;

        return view('profile.editar-servicos', compact('categorias'));
        
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
        // Busca prof (contém user, categorias, serviços e especialidades) pelo id do userProf logado
        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Serviços cadastradas pelo profissional
        $servicos = $prof->servicos;
        
        return view('profile.editar-especialidades', compact('servicos'));
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
            return redirect()->back()->withErrors('(Selecione no mínimo 1 especialidade)');
        }
    }

    public function editarPerfil()
    {
        return view('profile.editar-perfil');
    }

    public function postEditarPerfil(Request $request)
    {
        // Pega os dados do formulário editar-perfil
        $perfil = $request->except(['_token']);

        if($perfil['url_perfil']){
            // Busca id do prof = id do prof logado
            $profissional = Professional::where('user_id', Auth::user()->id)->get()->first();
            // Atualiza as informãções do perfil e salva no banco
            $insert = $profissional->update($perfil);

            if($insert){
                return redirect()->route('my-profile');
            }else{
                return redirect()->back()->withErrors('Erro ao atualizar dados.');
            }
        }else{
            return redirect()->back()->withErrors('(Informe uma url para o seu perfil.)');
        }

    }

}
