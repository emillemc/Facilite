<div class="row">
  <div class="col-lg-6">
    <button class="btn-cyan-large" data-toggle="modal" data-target="#modalAlterarSenha"><span class="glyphicon glyphicon-wrench"></span> ALTERAR SENHA</button>
  </div>
  <div class="col-lg-6">
    <button class="btn-red-large" data-toggle="modal" data-target="#modalExcluirConta"><span class="glyphicon glyphicon-trash"></span> EXCLUIR CONTA</button>
  </div>
</div>

@include('layouts.includes.modal-excluir-conta')

@include('layouts.includes.modal-alterar-senha')