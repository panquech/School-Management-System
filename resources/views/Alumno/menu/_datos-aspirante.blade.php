    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Secciones</h4>
        </div>
        <div class="card-body">
            <ul class="list-unstyled team-members">
                <li>
                    <div class="row">
                        <div class="col-md-2 col-2">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="col-md-7 col-7">
                            Datos Personales
                            <br />
                            <span class="text-success">
                                <small>Completo</small>
                            </span>
                        </div>
                        <div class="col-md-3 col-3 text-right">
                            <a href="{{ route('alumno.show', ['id']) }}">
                                <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-check"></i></btn>
                            </a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-md-2 col-2">
                            <i class="fa fa-address-book"></i>
                        </div>
                        <div class="col-md-7 col-7">
                            Domicilio / Contacto
                            <br />
                            <span class="{{ $estatus['st_dom']['clase'] }}">
                                <small>{{ $estatus['st_dom']['estatus'] }}</small>

                            </span>
                        </div>
                        <div class="col-md-3 col-3 text-right">
                            <a href="{{ route('alumno.contacto.index', $alumno->id ) }}">
                                {!! $estatus['st_dom']['icono'] !!}
                            </a>
                        </div>
                    </div>
                </li>
                
                
            </ul>
        </div>
    </div>