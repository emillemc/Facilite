<div class="modal" id="modalAlterarSenha">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><b>Alterar senha</b></h4>
      </div>
      <div class="modal-body">
        <form action="#!" method="POST">
          {{ csrf_field() }}

          <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="current_password">Senha atual:</label>
            <div>
              <input type="password" name="current_password" id="current_password" class="form-control"/>

              @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif

            </div>
          </div>

          <div class="{{ $errors->has('password') ? ' has-error' : '' }}" style="margin-top: 10%;">
            <label for="password">Nova senha:</label>
            <div>
              <input type="password" name="password" id="password" class="form-control"/>

              @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif

            </div>
          </div>

          <div class="{{ $errors->has('password') ? ' has-error' : '' }}" style="margin-top: 5%;">
            <label for="password_confirmation">Confirmar Senha:</label>
            <div>
              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"/>

              @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif

            </div>
          </div>

        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
      </div>
      
    </div>
  </div>
</div>