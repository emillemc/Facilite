<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Models\Servico;
use App\Models\Especialidade;
use App\Professional;
use App\User;

class AppController extends Controller
{
	public function __construct()
	{
        // Só acessa se estiver logado
        $this->middleware('auth')->only('listarPerfis');
	}

    // HOME
    public function index()
    {   
        // Se o usuário estiver logado
        if (Auth::check()) {
            // Se o usuário for prof, verifica se cadastrou informações anteriormente
            if (Auth::user()->role == 'prof') {
                $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
                // Se não cadastrou, redireciona para editar-perfil
                if (!$prof->url_perfil) {
                    return redirect()->route('editar-perfil');
                } else {
                    // Home Page
                    return view('app.home');
                }
            } else {
                // Home Page
                return view('app.home');
            }
        } else {
            // Home Page
            return view('app.home');
        }
    }

    public function listarCategorias()
    {
        // Busca todas as categorias disponíveis
        $categorias = Categoria::get();

        return view('app.listar-categorias', compact('categorias'));
    }

    public function listarServicos($urlCat)
    {   
        // Busca a categoria de acordo com a $urlCat da categoria informada
        $categoria = Categoria::where('url', $urlCat)->get()->first();
        // Se for encontrada a categoria...
        if ($categoria) {
            // Busca os serviços de acordo com a categoria buscada
            $servicos = Servico::where('categoria_id', $categoria->id)->get();
            // Retorna a view com a categoria e os servicos buscados
            return view('app.listar-servicos', compact('categoria', 'servicos'));
        } else {
            // Redireciona para home caso não encontre uma $urlCat válida
            return redirect()->route('home');
        }

    }

    public function listarProfissionais($urlCat, $urlServ)
    {
        // Busca a categoria de acordo com a $urlCat da categoria informada
        $categoria = Categoria::where('url', $urlCat)->get()->first();
        // Se for encontrada a categoria...
        if ($categoria) {
            // Busca os serviços de acordo com a categoria buscada e a $urlServ passada
            $servico = Servico::where('categoria_id', $categoria->id)->where('url', $urlServ)->get()->first();
            // Se for encontrado o serviço...
            if ($servico) {
                // Busca as especialidades a partir do id do serviço
                $especialidades = Especialidade::where('servico_id', $servico->id)->get();
                // Busca profissional a partir da categoria e serviço visitado (Exibe apenas os profissionais 'active')
                $profissionais = Professional::with('user', 'servicos')
                    ->join('servico_professional', 'professionals.id', '=', 'servico_professional.professional_id')
                    ->join('servicos', 'servicos.id', '=', 'servico_professional.servico_id')
                    ->join('categoria_professional', 'professionals.id', '=', 'categoria_professional.professional_id')
                    ->join('categorias', 'categorias.id', '=', 'categoria_professional.categoria_id')
                    ->where('categorias.id', $categoria->id)->where('servicos.id', $servico->id)->where('professionals.status', 'active')->get();
            } else {
                // Redireciona para home caso não retorne o servico
                return redirect()->route('home');
            }
        } else {
            // Redireciona para home caso não encontre uma url válida para categoria
            return redirect()->route('home');
        }
        return view('app.listar-profissionais', compact('categoria', 'servico', 'especialidades', 'profissionais'));
    }

    public function listarPerfis($urlPerfil)
    {        
        // Busca o perfil profissional de acordo com a '$urlPerfil' informado e perfil 'active'
        $prof = Professional::where('url_perfil', $urlPerfil)->where('status', 'active')->get()->first();
        // Se for encontrada o perfil...
        if ($prof) {
            // Id do Profissional
            $id = $prof->user_id;
            // Nome do profissional
            $name = $prof->user['name'];
            // Serviços cadastrados pelo profissional
            $servicos = $prof->servicos;
            // Especialidades cadastradas pelo profissional
            $especialidades = $prof->especialidades;
            // Retorna a view com o perfil do profissional
            return view('app.perfil-profissional', compact('id', 'name', 'servicos', 'especialidades'));
        } else {
            // Redireciona para home caso não retorne o servico
            return redirect()->route('home');
        }
    }
}
