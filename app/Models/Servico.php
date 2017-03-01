<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Especialidade;

class Servico extends Model
{
	// protected $fillable = ['name'];

	// Vários Serviços pertencem a uma Categoria (Many-To-One)
    public function categoria()
    {	
    	return $this->belongsTo(Categoria::class);
    }

    // Um serviço tem várias Especialidades (One-To-Many)
    public function especialidades(){
    	return $this->hasMany(Especialidade::class);
    }
}
