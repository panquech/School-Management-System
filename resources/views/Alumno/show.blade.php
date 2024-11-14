@extends('layouts.layout-application')

@section('styles')
<link rel="stylesheet" href="{{ url('/vendor/css/login/registro.css') }}">
<link rel="stylesheet" href="{{ url('/vendor/css/sweetalert2.css') }}">
@endsection

@section('scripts')
<script src="{{ url('/vendor/js/plugins/sweetalert2.js') }}"></script>
<script src="{{ url('vendor/js/aspirante/personal.js')}}" type="text/javascript"></script>
<script src="{{ url('vendor/js/aspirante/estadistico.js')}}" type="text/javascript"></script>
<script src="{{ url('vendor/js/solicitud/captura_solicitud.js')}}" type="text/javascript"></script>
@endsection
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title">Alumno</h5>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-md-4 pr-1">
              <div class="form-group">
                <label>Nombre(s) *</label>
                <input type="text" name="nombre" id="id_nombre" class="form-control" value="{{ $alumno->user->name }}">
              </div>
            </div>
            <div class="col-md-4 px-1">
              <div class="form-group">
                <label>Primer apellido *</label>
                <input type="text" name="primera" id="id_primera" class="form-control" value="{{ $alumno->user->apellido1 }}">
              </div>
            </div>
            <div class="col-md-4 pl-1">
              <div class="form-group">
                <label for="exampleInputEmail1">Segundo apellido </label>
                <input type="text" name="segunda" id="id_segunda" class="form-control" value="">
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
