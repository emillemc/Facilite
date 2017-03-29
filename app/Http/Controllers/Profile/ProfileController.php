<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Professional;
use App\Models\Categoria;
use App\Http\Requests\Profile\ProfileEditFormRequest;
use App\Http\Requests\Profile\UrlEditFormRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        // Só acessa se estiver logado
    	$this->middleware('auth');
        // Só acessa profissionais
    	$this->middleware('role:prof');
    }

    // View Perfil Profissional
    public function index()
    {
        // Busca prof (contém user, categorias, serviços e especialidades) pelo id do userProf logado
        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Verifica se o profissional está ativo
        $profStatus = $prof->status;
        if ($profStatus == 'active') {
            // Nome do profissional
            $name = $prof->user['name'];
            // Serviços cadastrados pelo profissional
            $servicos = $prof->servicos;
            // Especialidades cadastradas pelo profissional
            $especialidades = $prof->especialidades;       
            // Exibe o perfil profissional com os dados cadastrados
            return view('profile.my-profile', compact('name', 'servicos', 'especialidades'));
        } else {
            // Redireciona para a página editar-perfil
            return redirect()->route('editar-perfil')->withErrors('Informe um endereço para o seu perfil!');
        }
    }

    // View Cadastrar/Editar Categorias
    public function editarCategorias()
    {   
        // Lista todas as categorias disponíveis
    	$categorias = Categoria::get();
        // Busca prof logado
        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Nome do prof
        $profName = $prof->user->name;
        // Busca categorias previamente cadastradas pelo prof (para exibir marcadas na view)
        $profCategorias = $prof->categorias;
    	return view('profile.editar-categorias', compact('categorias', 'profCategorias', 'profName'));
    }

    // Cadastrar Categorias (Primeiro cadastro)
    public function postCadastrarCategorias(Request $request)
    {
        // Pega os checkbox's marcados, exceto o token
        $categorias = $request->except(['_token']);
        // Verifica categorias >=1 e <=3
        if (count($categorias) >= 1 && count($categorias) <= 2) {
            // Busca id do prof = id do prof logado
            $profissional = Professional::where('user_id', Auth::user()->id)->get()->first();
            // Atualiza as categorias escolhidas e salva no banco de dados
            $insert = $profissional->categorias()->sync($categorias);
            if ($insert) {
                return redirect()->route('editar-servicos');
            } else {
                return redirect()->back()->withErrors('Erro ao atualizar dados.');
            }
        } else {
            return redirect()->back()->withErrors('Selecione no mínimo 1 e no máximo 2 categorias!');
        }
    }

    // Editar Categorias
    public function postEditarCategorias(Request $request)
    {
        // Pega os checkbox's marcados, exceto o token
        $categorias = $request->except(['_token']);
        // Verifica categorias >=1 e <=3
        if (count($categorias) >= 1 && count($categorias) <= 2) {
            // Busca id do prof = id do prof logado
            $profissional = Professional::where('user_id', Auth::user()->id)->get()->first();
            // Atualiza as categorias escolhidas e salva no banco de dados
            $insert = $profissional->categorias()->sync($categorias);
            if ($insert) {
                return redirect()->route('editar-servicos');
            } else {
                return redirect()->back()->withErrors('Erro ao atualizar dados.');
            }
        } else {
            return redirect()->back()->withErrors('Selecione no mínimo 1 e no máximo 2 categorias!');
        }
    }

    // View Cadastrar/Editar Serviços
    public function editarServicos()
    {
        // Busca prof (contém user, categorias, serviços e especialidades) pelo id do userProf logado
        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Verifica se o profissional cadastrou alguma categoria anteriormente
        $categorias = $prof->categorias;
        if (count($categorias) >= 1) {
            // Busca servicos previamente cadastradas pelo prof, para exibir marcadas na view (se existir)
            $profServicos = $prof->servicos;
            // Exibe as categorias com seus respectivos serviços na view
            return view('profile.editar-servicos', compact('categorias', 'profServicos'));
        } else {
            // Redireciona para editar-categorias
            return redirect()->route('editar-categorias')->withErrors('Selecione no mínimo 1 e no máximo 2 categorias!');
        }
    }

    // Cadastrar Serviços (Primeiro cadastro)
    public function postCadastrarServicos(Request $request)
    {
        // Pega os checkbox's marcados, exceto o token
        $servicos = $request->except(['_token']);
        // Verifica servicos >=1 e <=5
        if (count($servicos) >= 1 && count($servicos) <= 5) {
            // Busca id do prof = id do prof logado
            $profissional = Professional::where('user_id', Auth::user()->id)->get()->first();
            // Atualiza os servicos escolhidos e salva no banco
            $insert = $profissional->servicos()->sync($servicos);
            if ($insert) {
                return redirect()->route('editar-especialidades');
            } else {
                return redirect()->back()->withErrors('Erro ao atualizar dados.');
            }
        } else {
            return redirect()->back()->withErrors('Selecione no mínimo 1 e no máximo 5 serviços!');
        }
    }

    // Editar Serviços
    public function postEditarServicos(Request $request)
    {
        // Pega os checkbox's marcados, exceto o token
        $servicos = $request->except(['_token']);
        // Verifica servicos >=1 e <=5
        if (count($servicos) >= 1 && count($servicos) <= 5) {
            // Busca id do prof = id do prof logado
            $profissional = Professional::where('user_id', Auth::user()->id)->get()->first();
            // Atualiza os servicos escolhidos e salva no banco
            $insert = $profissional->servicos()->sync($servicos);
            if ($insert) {
                return redirect()->route('editar-especialidades');
            } else {
                return redirect()->back()->withErrors('Erro ao atualizar dados.');
            }
        } else {
            return redirect()->back()->withErrors('Selecione no mínimo 1 e no máximo 5 serviços!');
        }
    }

    // View Cadastrar/Editar Especialidades
    public function editarEspecialidades()
    {
        // Busca prof (contém user, categorias, serviços e especialidades) pelo id do userProf logado
        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Verifica se o profissional cadastrou serviços anteriormente
        $servicos = $prof->servicos;
        if (count($servicos) >= 1) {
            // Busca especialidades previamente cadastradas pelo prof, para exibir marcadas na view (se existir)
            $profEspecialidades = $prof->especialidades;
            // Exibe os serviços com suas respectivas especialidades na view
            return view('profile.editar-especialidades', compact('servicos', 'profEspecialidades'));
        } else {
            // Redireciona para editar-servicos
            return redirect()->route('editar-servicos')->withErrors('Selecione no mínimo 1 e no máximo 5 serviços!');
        }
    }

    // Cadastrar Especialidades (Primeiro cadastro)
    public function postCadastrarEspecialidades(Request $request)
    {
        // Pega os checkbox's marcados, exceto o token
        $especialidades = $request->except(['_token']);
        // Mínimo de 1 especialidade
        if (count($especialidades) >= 1) {
            // Busca id do prof = id do prof logado
            $profissional = Professional::where('user_id', Auth::user()->id)->get()->first();
            // Atualiza as especialidades escolhidos e salva no banco
            $insert = $profissional->especialidades()->sync($especialidades);
            if ($insert) {
                return redirect()->route('editar-perfil');
            } else {
                return redirect()->back()->withErrors('Erro ao atualizar dados.');
            }
        } else {
            return redirect()->back()->withErrors('Selecione no mínimo 1 especialidade!');
        }
    }

    // Editar Especialidades
    public function postEditarEspecialidades(Request $request)
    {
        // Pega os checkbox's marcados, exceto o token
        $especialidades = $request->except(['_token']);
        // Mínimo de 1 especialidade
        if (count($especialidades) >= 1) {
            // Busca id do prof = id do prof logado
            $profissional = Professional::where('user_id', Auth::user()->id)->get()->first();
            // Atualiza as especialidades escolhidos e salva no banco
            $insert = $profissional->especialidades()->sync($especialidades);
            if ($insert) {
                return redirect()->route('editar-especialidades');
            } else {
                return redirect()->back()->withErrors('Erro ao atualizar dados.');
            }
        } else {
            return redirect()->back()->withErrors('Selecione no mínimo 1 especialidade!');
        }
    }

    // View Editar Perfil
    public function editarPerfil()
    {
        // Busca prof (contém user, categorias, serviços e especialidades) pelo id do userProf logado
        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Verifica se o profissional cadastrou alguma especialidade anteriormente
        $especialidades = $prof->especialidades;
        if (count($especialidades) >= 1) {
            // Busca url do perfil cadastrada anteriormente (se existir)
            $urlProf = $prof->url_perfil;
            // Busca cidade do profissional cadastrada anteriormente (se existir)
            $cityProf = $prof->city;
            // Busca descrição do perfil cadastrada anteriormente (se existir)
            $descriptionProf = $prof->description;
            // Exibe a view de edição de perfil
            return view('profile.editar-perfil', compact('urlProf', 'cityProf', 'descriptionProf'));
        }else{
            // Redireciona para editar-servicos
            return redirect()->route('editar-especialidades')->withErrors('Selecione no mínimo 1 especialidade!');
        }
    }

    public function postEditarPerfil(Request $request)
    {
        // Busca id do prof = id do prof logado
        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Se houver configurado a url do perfil
        if (isset($prof->url_perfil)) {
            return redirect()->route('my-profile');
        }else{
            return redirect()->back()->withErrors('Informe um endereço para o seu perfil!');
        }
    }

    public function postEditarUrl(UrlEditFormRequest $request)
    {
        // Pega os dados do formulário editar-url
        $dataForm = $request->except(['_token']);
        // Busca id do prof = id do prof logado
        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Cadastra/Atualiza a url do perfil e ativa o perfil profissional
        $insert = $prof->update([
            'url_perfil'    => $dataForm['url_perfil'],
            'status'        => 'active',
        ]);
        if ($insert) {
            return redirect()->route('editar-perfil');
        } else {
            return redirect()->back();
        }
    }

    public function postEditarDescricao(Request $request)
    {
        // Pega os dados do formulário editar-descrição
        $dataForm = $request->except(['_token']);
        // Busca id do prof = id do prof logado
        $prof = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Cadastra/Atualiza a descrição do perfil profissional
        $insert = $prof->update([
            'description'    => $dataForm['description'],
        ]);
        if ($insert) {
            return redirect()->route('editar-perfil');
        } else {
            return redirect()->back();
        }
    }
}
