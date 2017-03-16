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
	public function __construct(Professional $prof)
	{
        $this->prof = $prof;
	}

    public function index()
    {   
        // Home Page do Site
        return view('app.home');
    }

    public function listarCategorias()
    {
        $categorias = Categoria::get();
        return view('app.listar-categorias', compact('categorias'));
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

    public function listarProfissionais($urlCat, $urlServ)
    {
        // Busca a categoria de acordo com a $url da categoria informada
        $categoria = Categoria::where('url', $urlCat)->get()->first();
        
        // Se for encontrada a categoria...
        if($categoria){
            // Lista os serviços de acordo com a categoria buscada e a url passada
            $servico = Servico::where('categoria_id', $categoria->id)->where('url', $urlServ)->get()->first();

            // Se for encontrado o serviço...
            if($servico){
                // Busca as especialidades a partir do id do serviço
                $especialidades = Especialidade::where('servico_id', $servico->id)->get();

                // Busca profissional a partir da categoria e serviço visitado
                $profissionais = Professional::with('user', 'servicos')
                    ->join('servico_professional', 'professionals.id', '=', 'servico_professional.professional_id')
                    ->join('servicos', 'servicos.id', '=', 'servico_professional.servico_id')
                    ->join('categoria_professional', 'professionals.id', '=', 'categoria_professional.professional_id')
                    ->join('categorias', 'categorias.id', '=', 'categoria_professional.categoria_id')
                    ->where('categorias.id', $categoria->id)->where('servicos.id', $servico->id)->get();

                    // dd($profissionais);
                    // foreach($profissionais as $profissional){
                    //     echo "{$profissional->user->name}:<br>";

                    //     foreach($profissional->servicos as $servico){
                    //         echo "{$servico->name}";
                    //     }
                    //     echo "<hr>";
                    // }

            }else{
                // Redireciona para home caso não retorne o servico
                return redirect()->route('home');
            }

        }else{
            // Redireciona para home caso não encontre uma url válida para categoria
            return redirect()->route('home');
        }        

        return view('app.listar-profissionais', compact('categoria', 'servico', 'especialidades', 'profissionais'));
    }
}
