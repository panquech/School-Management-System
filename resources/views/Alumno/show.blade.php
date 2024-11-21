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
<div class="row d-flex justify-content-center">
  <div class="col-md-3">
    {{-- Aquí va el menú --}}
    @include('alumno.menu._datos-aspirante')
    {{--  --}}
  </div>
  <div class="col-md-9">
    {{-- Verificar si hay un mensaje en la sesión --}}
    @if(session('message'))
        <div class="alert alert-warning">
            {{ session('message') }}
        </div>
    @endif
    <div class="card card-user">
      <div class="card-header">
        <h4 class="card-title">Alumno</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-4 pr-1">
            <div class="form-group">
              <label>Nombre(s) *</label>
              <input type="text" name="nombre" id="id_nombre" class="form-control" value="{{ $alumno->user->name }}" disabled>
            </div>
          </div>
          <div class="col-md-4 px-1">
            <div class="form-group">
              <label>Primer apellido *</label>
              <input type="text" name="primera" id="id_primera" class="form-control" value="{{ $alumno->user->apellido1 }}" disabled>
            </div>
          </div>
          <div class="col-md-4 pl-1">
            <div class="form-group">
              <label for="exampleInputEmail1">Segundo apellido </label>
              <input type="text" name="segunda" id="id_segunda" class="form-control" value="{{ $alumno->user->apellido2 }}" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 pr-1">
            <div class="form-group">
              <label>RFC *</label><small class="text-left">&nbsp;(Registro Federal de Contribuyentes)</small>
              <input type="text" name="rfc" id="id_rfc" class="form-control" placeholder="Registro Federal de Contribuyentes" value="{{ $alumno->rfc }}" disabled>
            </div>
          </div>
          <div class="col-md-4 px-1">
            <div class="form-group">
              <label>CURP *</label><small class="text-left">&nbsp;(Clave Única de Registro de Población)</small>
              <input type="text" name="curp" id="curp" maxlength="18" class="form-control" value="{{ $alumno->curp }}" disabled>
            </div>
          </div>
          <div class="col-md-4 px-1">
            <div class="form-group">
              <label>Fecha de nacimiento *</label><small>&nbsp;(DD/MM/AAAA)</small>
              <input type="date" name="fecha" id="id_fecha" class="form-control" value="{{ $alumno->fecha_nacimiento }}" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 pr-1">
            <div class="form-group">
              <label>Nacionalidad *</label>
              <input type="text" class="form-control" value="{{ $alumno->nacionalidad->nacionalidad}}" disabled>
            </div>
          </div>
          <div class="col-md-4 pr-1">
            <div class="form-group">
              <label>País de nacimiento *</label>
              <input type="text" class="form-control" value="{{ $alumno->pais->pais }}" disabled>
            </div>
          </div>
          @if($estado)
            <div class="col-md-4 px-1">
              <div class="form-group">
                <label id="lblEstado" name="lblEstado">Estado de nacimiento *</label>
                <input type="text" class="form-control" value="{{ $estado->d_estado }}">
              </div>
            </div>
          @endif
        </div>
        <p></p>
      </div>
    </div>
  </div>
</div>
@endsection
