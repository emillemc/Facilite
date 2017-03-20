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
        // Verifica se o profissional escolheu uma url para o seu perfil
        $urlPerfil = $prof->url_perfil;
        if($urlPerfil){
            // Nome do profissional
            $name = $prof->user['name'];
            // Serviços cadastrados pelo profissional
            $servicos = $prof->servicos;
            // Especialidades cadastradas pelo profissional
            $especialidades = $prof->especialidades;       
            // Exibe o perfil profissional com os dados cadastrados
            return view('profile.my-profile', compact('name', 'servicos', 'especialidades'));
        }else{
            // Redireciona para a página editar-perfil
            return redirect()->route('editar-perfil');
        }
    }

    public function editarCategorias()
    {   
        // Lista todas as categorias disponíveis
    	$categorias = Categoria::get();
        // Busca prof logado
        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Busca categorias previamente cadastradas pelo prof (para exibir marcadas na view)
        $profCategorias = $prof->categorias;

    	return view('profile.editar-categorias', compact('categorias', 'profCategorias'));
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
        // Verifica se o profissional cadastrou alguma categoria anteriormente
        $categorias = $prof->categorias;
        if(count($categorias) >= 1){
            // Busca servicos previamente cadastradas pelo prof, para exibir marcadas na view (se existir)
            $profServicos = $prof->servicos;
            // Exibe as categorias com seus respectivos serviços na view
            return view('profile.editar-servicos', compact('categorias', 'profServicos'));
        }else{
            // Redireciona para editar-categorias
            return redirect()->route('editar-categorias');
        }
        
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
        // Verifica se o profissional cadastrou serviços anteriormente
        $servicos = $prof->servicos;
        if(count($servicos) >= 1){
            // Busca especialidades previamente cadastradas pelo prof, para exibir marcadas na view (se existir)
            $profEspecialidades = $prof->especialidades;
            // Exibe os serviços com suas respectivas especialidades na view
            return view('profile.editar-especialidades', compact('servicos', 'profEspecialidades'));
        }else{
            // Redireciona para editar-servicos
            return redirect()->route('editar-servicos');
        }
        
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
        // Busca prof (contém user, categorias, serviços e especialidades) pelo id do userProf logado
        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Verifica se o profissional cadastrou alguma especialidade anteriormente
        $especialidades = $prof->especialidades;
        if(count($especialidades) >= 1){
            // Busca url do perfil cadastrada anteriormente (se existir)
            $urlPerfil = $prof->url_perfil;
            // Exibe a view de edição de perfil
            return view('profile.editar-perfil', compact('urlPerfil'));
        }else{
            // Redireciona para editar-servicos
            return redirect()->route('editar-especialidades');
        }
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
