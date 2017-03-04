<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Professional extends Authenticatable
{
	use Notifiable;
	
    protected $fillable = [
        'tel', 'cpf', 'city',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
