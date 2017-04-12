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

        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer')
    {{-- @include('layouts.includes.footer') --}}
@endsection