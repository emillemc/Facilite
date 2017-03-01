<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;

class Especialidade extends Model
{
    // protected $fillable = ['name'];

	// Várias Especialidades pertencem a um Serviço (Many-To-One)
    public function servico()
    {	
    	return $this->belongsTo(Servico::class);
    }
}
