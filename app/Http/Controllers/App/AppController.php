<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Servico;

class AppController extends Controller
{
	public function __construct()
	{

	}

    public function index()
    {   
        // Home Page do Site
        return view('app.home');
    }

    public function listarCategorias()
    {
        //*** -> Buscar as categorias e exibir na view
        return view('app.listar-categorias');
    }

    public function listarServicos($urlCat = "moda-beleza") // Valor padrão caso não seja passado nenhuma url route
    {   
        // Busca a categoria de acordo com a $url da categoria informada
        $categoria = Categoria::where('url', $urlCat)->get()->first();

        // Se a url existir, mostra a page e lista os serviços
        if($categoria){

            // Lista os serviços de acordo com a categoria buscada
            $servicos = Servico::where('categoria_id', $categoria->id)->get();

            // Retorna a view com a categoria e os servicos buscados
            return view('app.listar-servicos', compact('categoria', 'servicos'));

        }else{
            
            // Redireciona para home caso não encontre uma url válida
            return redirect()->route('home');
        }

    }

    public function listarProfissionais($urlCat = "moda-beleza", $urlServ = "manicure") // Valor padrão caso não seja passado nenhuma url route
    {
        return view('app.listar-profissionais');
    }
}
