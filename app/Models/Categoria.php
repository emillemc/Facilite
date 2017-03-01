<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;

class Categoria extends Model
{
	// protected $fillable = ['name'];

	// Uma Categoria tem muitos Serviços (One-To-Many)
    public function servicos()
    {
    	return $this->hasMany(Servico::class);
    }
}
