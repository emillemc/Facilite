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

    public function index()
    {

    }

    public function editarCategorias(Categoria $categoria)
    {
    	$this->categoria = $categoria;

        $categorias = $this->categoria->all();

    	return view('profile.editar-categorias', compact('categorias'));
    }

    public function postEditarCategorias(Request $request)
    {
        // Pega os checkbox's marcados, exceto o token
        $categorias = $request->except(['_token']);
        // Busca id do prof = id do prof logado
        $profissional = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Atualiza as categorias escolhidas e salva no banco de dados
        $insert = $profissional->categorias()->sync($categorias);

        if($insert){
            return redirect()->route('editar-servicos');
        }else{
            return redirect()->back()->withErrors('Erro ao atualizar dados.');
        }

    }

    public function editarServicos()
    {
        return "Page editar serviços...";
    }
}
