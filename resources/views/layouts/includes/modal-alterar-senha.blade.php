<div class="modal" id="modalAlterarSenha">
  <div class="modal-dialog modal-sm">
    <form action="{{route('alterar-senha')}}" method="POST">
      {{ csrf_field() }}
      <div style="border-radius: 0px !important;" class="modal-content">
        {{-- <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><b>Alterar senha</b></h4>
        </div> --}}
        <div class="modal-body">
          <button style="font-size: 30px;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          

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
              <label for="password_confirmation">Confirmar nova senha:</label>
              <div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"/>

                @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif

              </div>
            </div>

        </div>

        <div class="modal-footer">
          {{-- <button type="button" class="btn-cyan-large" data-dismiss="modal">Cancelar</button> --}}
          <button type="submit" class="btn-green-large">Alterar senha</button>
        </div>
        
      </div>
    </form>
  </div>
</div>