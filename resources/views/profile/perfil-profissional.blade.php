@extends('layouts.master-fluid')

@section('title') Editar Categorias - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header')
@endsection

@section('content')
      <hr>
      <!-- ROW -->
      <div class="row">
        
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        ~~~~~~~~~~~~~~~~ BLOCO PRINCIPAL 1 - ESQUERDA (AVALIAÇÃO PROFISSIONAL) ~~~~~~~~~~~~~~~~~~~ 
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">

          <!-- NOTAS DE AVALIAÇÃO (FEEDBACK) -->
          <div class="panel panel-default">
            <div class="panel-body">
              
                <h3><b>Avaliação:</b></h3>
                <div class="text-center">
                <h4 class="font-60">0.0</h4>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 35px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 35px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 35px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 35px;"></span>
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true" style="font-size: 35px;"></span>
                <hr>
              </div>
              
              <div class="text-right" style="margin-right: 17%;">
                <span class="font-16">Serviço: 
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span><br/>
                </span>
              

                <span class="font-16">Pontualidade: 
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span><br/>
                </span>

                <span class="font-16">Preço: 
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span><br/>
                </span> 

                <span class="font-16">Quesito 4: 
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span><br/>
                </span> 

                <span class="font-16">Quesito 5: 
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                  <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span><br/>
                </span> 
              </div>
              <hr>
              <div class="text-center">
                <button type="submit" class="btn btn-warning btn-lg">Avaliar</button>
              </div>
            </div>
            <!-- //PAINEL -->
          </div>
          <!-- //NOTAS DE AVALIAÇÃO (FEEDBACK) -->
          

          <!-- COMENTÁRIOS -->
          <div class="panel panel-default">
            <div class="panel-body">
              <h3 class="margin-0"><b>Comentários:</b></h3>
              <hr>
              <div class="text-center">
                {{-- <p>Aqui comentários de clientes...</p> --}}
                <hr>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-warning btn-lg">Escrever</button>
              </div>
            </div>
          </div>     
          <!-- //COMENTÁRIOS -->
          

        </div>
        <!-- //BLOCO PRINCIPAL 1 (AVALIAÇÃO PROFISSIONAL) -->

        
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        ~~~~~~~~~~~ BLOCO PRINCIPAL 2 PERFIL (CONTRATAR) ~~~~~~~~~~~ 
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">

          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="panel panel-default">

                <!-- CLEARFIX PARA ENCAIXAR AS COLUNAS NO PAINEL HEAD -->
                <div class="panel-heading clearfix">

                  {{-- ******************* FOTO PROFISSIONAL ******************** --}}
                  <div class="col-lg-3 col-md-3 col-sm-5 col-xs-5 text-center">
                    <img src="{{ asset('img/perfil.png') }}" alt="img_perfil2" class="img-circle">
                  </div>

                  {{-- ************ NOME/SERVIÇOS PROFISSIONAL ************** --}}

                    {{-- Display Desktop --}}
                    <div class="visible-lg visible-md">
                      <div class="col-lg-6 col-md-6">
                        <h2><b>{{$profName}}</b></h2>
                        <hr>
                        <!-- ícones Serviços -->
                        <div class="">
                          @forelse($prof->servicos as $servico)
                            <span>•{{$servico->name}}&nbsp;</span>
                          @empty
                          @endforelse
                        </div>
                      </div>
                    </div>
                    {{-- *******//****** --}}

                    {{-- Display Mobile (Centralizado) --}}
                    <div class="visible-sm visible-xs text-center">
                      <div class="col-sm-7 col-xs-7">
                        <h2><b>{{$profName}}</b></h2>
                        <hr>
                      </div>
                      <!-- Ícones Serviços -->
                      <div class="">
                        @forelse($prof->servicos as $servico)
                          <span>•{{$servico->name}}&nbsp;</span>
                        @empty
                        @endforelse
                        <hr>
                      </div>
                    </div>
                    {{-- *************//************ --}}

                  {{-- ********************* BLOCO VISU/CURTIDAS ********************** --}}
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="col-lg-7 col-md-12 col-sm-7 col-xs-6">
                      <div class="text-center">
                        <span class="glyphicon glyphicon glyphicon-eye-open" style="font-size: 16px;"></span> <span>0</span> <label style="font-size: 13px">Visualizações</label>
                      </div>
                    </div>

                    <div class="col-lg-5 col-md-12 col-sm-5 col-xs-6">
                      <div class="text-center">
                        <span class="glyphicon glyphicon-heart-empty" style="font-size: 16px;"></span> <span>0</span> <label style="font-size: 13px">Favoritos</label>
                      </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                      <hr>
                      <button type="button" title="Contratar" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalContratar">
                        <span>Contratar</span>
                      </button>
                    </div>
                  </div>

                  <!-- MODAL CONTRATAR -->
                  <div class="modal fade" id="modalContratar" tabindex="-1" role="dialog" aria-labelledby="modalContratar">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="modalContratarLabel">
                            <!-- <span class="glyphicon glyphicon-list-alt pull-left" aria-hidden="true"></span> <-->
                              <h3 class="margin-0"><b>Solicitar serviços de "{{$profName}}" :</b></h3>
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
                              
                              @forelse($prof->servicos as $servico)
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
                </div>
              </div>
            </div>
          </div>
          
          <!-- ROW -->
          <div class="row">
            <div class="col-lg-8 col-md-8">
              <!-- ESPECIALIDADES -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3><b>Especialidades:</b></h3>
                  <hr>
                  <div class="">
                    @forelse($prof->servicos as $servico)
                      <h4>{{$servico->name}}:</h4>

                      @forelse($servico->especialidades as $especialidade)
                        <span>•{{$especialidade->name}}&nbsp;</span>
                      @empty
                      @endforelse

                    @empty
                    @endforelse
                  </div>
                  <hr>
                </div>
              </div>     
              <!-- //ESPECIALIDADES -->
            </div>

            <div class="col-lg-4 col-md-4">
              <!-- LOCAIS -->
              <div class="panel panel-default">
                <div class="panel-body">
                  <h3><b>Locais:</b></h3>
                  <hr>
                  <div class="text-center">
                    {{-- <p>Estado 1: Cidade 1, Cidade 2, Cidade 3...</p>
                    <p>Estado 2: Cidade 1, Cidade 2, Cidade 3...</p> --}}
                  </div>
                  <hr>
                </div>
              </div>     
              <!-- //LOCAIS-->

              <div class="panel panel-default">
                <div class="panel-body">
                  <h3 class="margin-0"><b>Calendário:</b></h3>
                  <hr>
                  <div class="text-center">
                    {{-- <span>Aqui calendário de agendamento do profissional...</span> --}}
                  </div>
                  <hr>
                </div>
              </div>

            </div>

          </div>
          <!-- //ROW -->

        </div>
        <!-- //BLOCO PRINCIPAL 1 PERFIL (BLOCO 1)-->

      </div><!-- //ROW-->
    </div><!-- //CONTAINER -->

@endsection

@section('footer')
    @include('layouts.includes.footer')
@endsection

@push('scripts')
  {{-- <script src="{{ asset('js/check-uncheck.js') }}"></script> --}}
  <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
@endpush