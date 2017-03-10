<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use App\Models\Categoria;
// use App\Models\Servico;
use App\Models\Especialidade;

class Professional extends Authenticatable
{
	use Notifiable;
	
    protected $fillable = [
        'user_id', 'tel', 'cpf', 'city',
    ];

    protected $hidden = [
        'password',
    ];

    // Um Profissional tem muitas Especialidades (Many-To-Many)
    public function especialidades()
    {
        return $this->belongsToMany(Especialidade::class, 'especialidade_professional');
    }

    // // Um Profissional tem muitas Categorias (Many-To-Many)
    // public function categorias()
    // {
    // 	return $this->belongsToMany(Categoria::class, 'categoria_professional');
    // }

    // // Um Profissional tem muitos Serviços (Many-To-Many)
    // public function servicos()
    // {
    //     return $this->belongsToMany(Servico::class, 'servico_professional');
    // }

}
