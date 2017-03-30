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
        <form action="#" >
          
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
                      <input type="checkbox" id="check_{{$servico->id}}" value="{{$servico->id}}">{{$servico->name}}
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

          <!-- COMENTÁRIOS -->
          <div class="row">
            <div class="col-md-12 col-md-12">
              <div class="form-group">
                <label for="comentarios" class="control-label"><i>Comentários:</i></label>
                <textarea class="form-control" name="comentarios" id="comentarios" rows="10"></textarea>
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