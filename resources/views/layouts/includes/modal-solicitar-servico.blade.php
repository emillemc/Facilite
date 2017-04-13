<!-- MODAL CONTRATAR -->
<div class="modal fade" id="modalSolicitarServico" tabindex="-1" role="dialog" aria-labelledby="modalSolicitarServico">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalSolicitarServicoLabel">
            <h3 class="margin-0"><b>Solicitar serviços de "{{$profile->user->name}}" :</b></h3>
        </h4>
      </div>
      <div class="modal-body">
        <!-- FORM SOLICITAR SERVIÇO -->
         <form action="{{ route('solicitar-servico.store') }}" method="POST" >
          {{ csrf_field() }}
          
          <input type="hidden" name="professional_id" value="{{ $profile->id }}">
          <!-- ESCOLHER SERVIÇOS -->
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <label><i>Escolha os serviços desejados:</i></label>
            </div>
            
            @forelse($profile->servicos as $servico)
              <!-- BLOCO SERVIÇOS -->
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 text-center">
                <div class="form-group">
                  <div class="checkbox">
                    <label for="check_{{$servico->id}}">
                      <input type="checkbox" name="servico_id" id="check_{{$servico->id}}" value="{{$servico->id}}">{{$servico->name}}
                    </label>
                  </div>
                </div>
              </div>
              <!-- //BLOCO SERVIÇOS -->
            @empty
              <h4>Não foi possível carregar o conteúdo...</h4>7
            @endforelse
            
          </div>
          <!-- //ESCOLHER SERVIÇOS -->

          <hr>

          <div class="row">
            <div class="col-md-12 col-md-12">
              <div class="form-group">
                <label for="data">Data:</label>
                <input type="text" name="data" class="form-control" id="data" >
              </div>
              <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="text" name="horario" class="form-control" id="hora" >
              </div>
              <div class="form-group">
                <label for="Telefone">Telefone:</label>
                <input type="text" name="numero" class="form-control" id="Telefone" placeholder="(00) 00000-0000">
              </div>
          </div>
          </div>

          <!-- COMENTÁRIOS -->
          <div class="row">
            <div class="col-md-12 col-md-12">
              <div class="form-group">
                <label for="mensagem" class="control-label"><i>Mensagem:</i></label>
                <textarea class="form-control" name="mensagem" id="mensagem" rows="10"></textarea>
              </div>
            </div>
          </div>
          <!-- //COMENTÁRIOS -->

          <!-- BOTÕES -->
          <div class="row">
            <div class="col-md-12 col-md-12">
              <div class="modal-footer">
                <button type="button" class="btn btn-fechar" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success">Solicitar serviço</button>
              </div>
            </div>
          </div>
          <!-- //BOTÕES -->

        </form>
        <!-- //FORM SOLICITAR SERVIÇO -->
      </div>
    </div>
  </div>
</div>
<!-- //MODAL CONTRATAR -->


@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.pt-BR.min.js"></script>
<script>
  $('#data').datepicker({
    language: "pt-BR",
    forceParse: false,
    autoclose: true
});
</script>
@endpush