@extends('layouts.master-fluid')

@section('title') Mensagens - Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12">
      <div class="panel panel-default shadow-1">
        <div class="panel-body">
          <h3 class="text-center cyan-third font-roboto">MENSAGENS</h3>
          <hr>
          <div class="table-responsive">
            <table class="table" id="myTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Usurio</th>
                  <th>Serviço</th>
                  <th>Telefone</th>
                  <th>Mensagem</th>
                  <th>Data</th>
                  <th>Açoes</th>
                </tr>
              </thead>
              <tbody>
                @foreach(Auth::user()->isProfessional->messages as $m)
                  <tr>
                    <td>{{ $m->id }}</td>
                    <td>{{ $m->user->name }}</td>
                    <td>{{ $m->servico->name }}</td>
                    <td>{{ $m->numero }}</td>
                    <td>{{ $m->mensagem }}</td>
                    <td>{{ $m->data }}</td>
                    <td>
                      <!-- <a href="#" class="btn btn-xs btn-primary">Visualizar <i class="fa fa-search" data-toggle="modal" data-target="myModal"></i></a> -->
                      <a data-id-message="{{$m->id}}" class="btn btn-xs btn-primary openModal" href="#myModal" role="button" data-toggle="modal" data-target="#myModal">Visualizar <i class="fa fa-search"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          
        </div>
      </div>
    </div>
  </div>


  <!-- Modal for view message -->

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalSolicitarServicoLabel">
           <h3 class="margin-0"><b>Serviço solicitado por:</b></h3>
        </h4>
      </div>
      <div class="modal-body">
        <div class="modal-data">


          
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- End modal -->
@endsection

@section('footer')
    {{-- @include('layouts.includes.footer') --}}
@endsection


@push('styles')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
@endpush
@push('scripts')
  {{-- check-uncheck.js --}}
  {{-- <script src="{{ asset('js/check-uncheck.js') }}"></script> --}}
  {{-- JQuery/JQuery Mask Plugins --}}
  {{-- <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('js/jquery.mask.min.js') }}"></script> --}}
   {{-- Eventos do Formulário --}}
  {{-- <script src="{{ asset('js/check-prof-mask-inputs.js') }}"></script> --}}

  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

  <script> 
    $(document).ready(function(){
      $('#myTable').DataTable();
    });
    
    $(".openModal").click(function(){
      let id = $(this)[0].getAttribute("data-id-message");
      $.ajax({
        url: "/solicitar-servico/"+id,
        method: "GET",
        dataType: "json",
        success(result,status,xhr){
        
          
          // $("#modalSolicitarServicoLabel > h3 > b").html("Mensagem: " +id );
          $('.modal-data').html(
            "<div class='row'>"+
            "<div class='col-lg-12 form-group'><b>Usurio: "+ result.user.name +"</b></div>"+
            "<div class='col-lg-12 form-group'><b>Serviço: "+ result.servico.name +"</b></div>"+
            "<div class='col-lg-12 form-group'><b>Contato: "+ result.numero +"</b></div>"+
            "<div class='col-lg-12 form-group'><b>Data solicitação: "+ result.data +"</b></div>"+
            "<div class='col-lg-12 form-group'><textarea class='form-control' disabled>" +result.mensagem +"</textarea></div>"+
            "</div>"
            );
          
        },
        error: function(data){
          alert('Error ao procurar esta mensagem');
        }
      });
    });
  </script>
@endpush