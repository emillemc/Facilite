<form action="{{ route('deletar-conta') }}" method="POST">
  {{ csrf_field() }}
  {{-- {{ method_field('DELETE')}} --}}
  <div class="modal" id="modalExcluirConta">
    <div class="modal-dialog modal-sm">
      <div style="border-radius: 0px !important;" class="modal-content">
        {{-- <div class="modal-header">
          <h5 class="modal-title"><b>Excluir Conta</b></h5>
        </div> --}}
        <div class="modal-body">
          <button style="font-size: 30px;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Sua conta será excluída permanentemente!<br><small>Deseja continuar?</small></h4>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn-red-large">Excluir conta</button>
        </div>
      </div>
    </div>
  </div>
</form>