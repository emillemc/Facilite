<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $categorias = $request->all();
    	return dd($categorias);
    }
}
