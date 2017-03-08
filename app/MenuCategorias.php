<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class MenuCategorias extends Model
{
	public function __construct(Categoria $categoria)
	{
		$this->categoria = $categoria;
	}
    // Categorias do NavBar
    public function menuCategorias()
    {
        return $this->categoria->all();
        // return 10;
    }
}
