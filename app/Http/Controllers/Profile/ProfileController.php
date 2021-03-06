<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Professional;
use App\Models\Categoria;
use App\Http\Requests\Profile\ProfileEditFormRequest;
use App\Http\Requests\Profile\UrlEditFormRequest;
use Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        // Só acessa se estiver logado
    	$this->middleware('auth');
        // Só acessa profissionais
    	$this->middleware('role:prof');
    }

     public function update_avatar(Request $request){
        // Handle the user upload of avatar
        //dd($request);
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(100, 100)->save( public_path('/uploads/avatars/' . $filename ) );
            $user = Auth::user()->isProfessional;
            $user->avatar = $filename;
            $user->save();
        }
        return redirect()->route('editar-perfil');
    }


    /**
     * Exibe o perfil do profissional 'my-profile'.
     * @return view | Exibe perfil com as informações do profissional.
     */
    public function index()
    {
        $profile = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Verifica se o profissional está ativo
        if ($profile->status == 'active') {       
            return view('profile.my-profile', compact('profile'));
        } else {
            return redirect()->route('editar-perfil')->withErrors('Informe um endereço para o seu perfil!');
        }
    }

    /**
     * Exibe view para cadastrar/editar categorias.
     * @return view | Exibe todas as categorias existentes na base de dados.
     * Se existir categorias cadastradas, exibe editar categorias com as categorias marcadas.
     * Se não, exibe cadastrar categorias.
     */
    public function editarCategorias()
    {   
    	$categorias = Categoria::get();
        $profile = Professional::where('user_id', Auth::user()->id)->get()->first();
    	return view('profile.editar-categorias', compact('categorias', 'profile'));
    }

    /////////////////////////////
    ///////SUJEITO A ALTERAÇÃO //
    /////////////////////////////
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

    /////////////////////////////
    ///////SUJEITO A ALTERAÇÃO //
    /////////////////////////////
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

    /**
     * Exibe view para cadastrar/editar serviços.
     * @return view | Exibe todas os serviços existentes na base de dados.
     * Se existir serviços cadastradas, exibe editar serviços com os serviços marcadas.
     * Se não, exibe cadastrar serviços.
     */
    public function editarServicos()
    {
        $profile = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Verifica se o profissional cadastrou alguma categoria anteriormente
        if (count($profile->categorias) >= 1) {
            return view('profile.editar-servicos', compact('profile'));
        } else {
            // Caso não exista categorias cadastradas
            return redirect()->route('editar-categorias')->withErrors('Selecione no mínimo 1 e no máximo 2 categorias!');
        }
    }

    /////////////////////////////
    ///////SUJEITO A ALTERAÇÃO //
    /////////////////////////////
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

    /////////////////////////////
    ///////SUJEITO A ALTERAÇÃO //
    /////////////////////////////
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

    /**
     * Exibe view para cadastrar/editar especialidades.
     * @return view | Exibe todas as especialidades existentes na base de dados.
     * Se existir especialidades cadastradas, exibe editar especialidades com as especialidades marcadas.
     * Se não, exibe cadastrar especialidades.
     */
    public function editarEspecialidades()
    {
        $profile = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Verifica se o profissional cadastrou algum serviço anteriormente
        if (count($profile->servicos) >= 1) {
            return view('profile.editar-especialidades', compact('profile'));
        } else {
            // Caso não exista serviços cadastradas
            return redirect()->route('editar-servicos')->withErrors('Selecione no mínimo 1 e no máximo 5 serviços!');
        }
    }

    /////////////////////////////
    ///////SUJEITO A ALTERAÇÃO //
    /////////////////////////////
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

    /////////////////////////////
    ///////SUJEITO A ALTERAÇÃO //
    /////////////////////////////
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

    /**
     * Exibe view para editar perfil profissional.
     * @return view | Exibe view editar-perfil.
     */
    public function editarPerfil()
    {
        $profile = Professional::where('user_id', Auth::user()->id)->get()->first();
        // Verifica se o profissional cadastrou alguma especialidade anteriormente
        if (count($profile->especialidades) >= 1) {
            return view('profile.editar-perfil', compact('profile'));
        }else{
            // Caso não exista especialidades cadastradas
            return redirect()->route('editar-especialidades')->withErrors('Selecione no mínimo 1 especialidade!');
        }
    }

    /////////////////////////////
    ///////SUJEITO A ALTERAÇÃO //
    /////////////////////////////
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

    /////////////////////////////
    ///////SUJEITO A ALTERAÇÃO //
    /////////////////////////////
    public function postEditarDescricao(ProfileEditFormRequest $request)
    {
        $dataForm = $request->except(['_token']);
        $profile = Professional::where('user_id', Auth::user()->id)->get()->first();
        $insert = $profile->update($dataForm);

        if ($insert) {
            return redirect()->route('editar-perfil');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Verifica se o perfil já foi configurado (ativo) e redireciona
     * para o perfil profissional (my-profile).
     * @param  Request $request | 
     * @return redirect() | Se perfil ativo, redireciona para 'my-profile'.
     * Caso contrário, back() informando os erros.
     */
    public function postEditarPerfil(Request $request)
    {
        $profile = Professional::where('user_id', Auth::user()->id)->get()->first();
        if ($profile->status == 'active') {
            return redirect()->route('my-profile');
        }else{
            return redirect()->back()->withErrors('Informe um endereço para o seu perfil!');
        }
    }
}
