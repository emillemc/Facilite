<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
	public function __construct()
	{

	}

    public function index()
    {
        return view('app.home');
    }

    public function listarServicos()
    {
    	// $categorias = $this->categoria->all(); 
    	// $categoria = Categoria::where('categoria', $nomeCategoria);
    }
}
