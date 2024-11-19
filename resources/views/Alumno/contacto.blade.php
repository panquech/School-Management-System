@extends('layouts.layout-application')

@section('styles')
<link rel="stylesheet" href="{{ url('/vendor/css/login/registro.css') }}">
<link rel="stylesheet" href="{{ url('/vendor/css/sweetalert2.css') }}">
@endsection

@section('scripts')
  <script src="{{ url('/vendor/js/plugins/sweetalert2.js') }}"></script>
  <script src="{{ url('vendor/js/aspirante/contacto.js')}}" type="text/javascript"></script>
  <script src="{{ url('vendor/js/solicitud/captura_solicitud.js')}}" type="text/javascript"></script>

@endsection
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card card-user">
      <div class="card-header">
        <h5 class="card-title">Domicilio</h5>
      </div>
      <div class="card-body">

          <div class="row">
            <div class="col-md-4 pr-1">
              <div class="form-group">
                <label>Calle*</label>
                <input type="text" name="calle" id="calle" class="form-control" value="{{$domicilio?$domicilio->calle:''}}">
              </div>
            </div>
            <div class="col-md-4 px-1">
              <div class="form-group">
                <label for="numext">Número exterior*</label>
                <input type="text" name="numext" id="numext" class="form-control" value="{{$domicilio?$domicilio->num_exterior:''}}">
              </div>
            </div>
            <div class="col-md-4 pl-1">
              <div class="form-group">
                <label>Número interior</label>
                <input type="text" name="numint" id="numint" class="form-control" value="{{$domicilio?$domicilio->num_interior:''}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 pr-1">
              <div class="form-group">
                <label>Colonia *</label>
                <input type="text" name="colonia" id="colonia" class="form-control" value="{{ $domicilio?$domicilio->colonia:''}}">
              </div>
            </div>
            <div class="col-md-4 px-1">
              <div class="form-group">
                <label>C.P. *</label>
                  <input type="text" name="cp" id="cp" maxlength="5" class="form-control" value="{{$domicilio?$domicilio->d_codigo:'00000'}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 pr-1">
              <div class="form-group">
                <label>País *</label>
                <input type="text" name="pais" id="pais" class="form-control" value="{{ $alumno?$alumno->pais->pais:'' }}">
                </select>
              </div>
            </div>
            <div class="col-md-4 px-1">
              <div class="form-group">
                <label id="lblEstado" name="lblEstado">Estado *</label>
                <input type="text" name="estado" id="estado" class="form-control" value="{{ $estado?$estado->d_estado:'' }}">
              </div>
            </div>
            <div class="col-md-4 pl-1">
              <div class="form-group">
                <label id="lblMunicipio" name="lblMunicipio">Municipio / Alcaldía *</label>
                <input type="text" name="municipio" id="municipio" class="form-control" value="{{ $municipio?$municipio->D_mnpio:'' }}">
              </div>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>About Me</label>
                <textarea class="form-control textarea">Oh so, your weak rhyme You doubt I'll bother, reading into it</textarea>
              </div>
            </div>
          </div> -->
          <!-- <hr> -->
          <div class="card-header">
            <h5 class="card-title">Contacto</h5>
          </div>
          <div class="row">
            <div class="col-md-4 pr-1">
              <div class="form-group">
                <i class="fa fa-phone"></i>
                <label>Teléfono*</label>
                <input type="text" name="telefono" id="telefono" class="form-control" maxlength="10" minlength="10" value="{{ $domicilio?$domicilio->referencia1:''}}">
              </div>
            </div>
            <div class="col-md-4 px-1">
              <div class="form-group">
                <i class="fa fa-mobile"></i>
                <label>Celular*</label>
                <input type="text" name="celular" id="celular" class="form-control" maxlength="10" minlength="10" value="{{$domicilio?$domicilio->referencia2:''}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 pr-1">
              <div class="form-group">
                <i class="fa fa-envelope"></i>
                <label for="exampleInputEmail1">Correo electrónico</label>
                <input type="text" class="form-control" value="{{ $user->email }}" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="update ml-auto mr-auto">
              <button type="submit" id="btn_guarda" name="btn_guarda" class="btn btn-primary btn-round text-right">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection