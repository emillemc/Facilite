<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	
    }

    public function editarConta()
    {
    	return "editar conta";
    }

    public function postEditarConta()
    {
    	//
    }
}
