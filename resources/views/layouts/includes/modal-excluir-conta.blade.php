<div class="modal" id="modalExcluirConta">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title"><b>Excluir Conta</b></h5>
      </div>
      <div class="modal-body">
        <form action="#!" method="POST">
          {{ csrf_field() }}
          <h4>Sua conta será excluída permanentemente!<br><small>Deseja continuar?</small></h4>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Excluir</button>
      </div>
    </div>
  </div>
</div>