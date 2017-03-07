<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Categoria;

class Professional extends Authenticatable
{
	use Notifiable;
	
    protected $fillable = [
        'user_id', 'tel', 'cpf', 'city',
    ];

    protected $hidden = [
        'password',
    ];

    // Um Profissional tem muitas Categorias (Many-To-Many)
    public function categorias()
    {
    	return $this->belongsToMany(Categoria::class, 'categoria_professional');
    }

}
