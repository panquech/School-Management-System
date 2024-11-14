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
        @foreach($alumno as $a)
        <ul>
          <li>
            <a href="{{ route('alumno.show', $a->id) }}">{{ $a->id }} {{ $a->user->name }} {{ $a->user->apellido1 }} {{ $a->user->apellido2 }}</a>
          </li>
        </ul>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
