<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno\Alumnos;
use App\Models\Alumno\AlumnosDomicilios;
use App\User;
use App\Models\CatNacionalidades;
use App\Models\SepomexEstados;
use App\Models\SepomexMunicipios;
use App\Models\SepomexCP;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$alumno = User::select('name', 'apellido1', 'apellido2')->orderBy('id', 'desc')->paginate();
        $alumno = Alumnos::orderBy('user_id', 'desc')->paginate();
        return view("alumno.index", compact('alumno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Intenta encontrar al alumno con ese ID y cargar la relación 'user'
        $alumno = Alumnos::with('user')->find($id); // Si no se encuentra, lanza ModelNotFoundException
        // Utilizamos firts porque solo queremos uno, y ya está definido por el id del alumno.
        if($alumno->estado_id == null){
            $estado = null;
        } else {
            $estado = SepomexEstados::where('c_estado', $alumno->estado_id)->first();
        }
        // Si todo está bien, pasar a la vista
        return view('alumno.show', compact('alumno', 'estado'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function contacto($id){
        // Se buscan los datos del aspirante
        $alumno = Alumnos::where('id', $id)->first();

        // Se guarda en una variable una instancia del usuario
        $user = User::where('id', $alumno->user->id)->first();
        
        // Obtener el domicilio del aspirante

        $domicilio = AlumnosDomicilios::where('alumno_id', $alumno->id)->first();
        if($domicilio){
            $cp = SepomexCP::where('d_codigo',$alumno->domicilio->d_codigo)->first();
            $estado = SepomexEstados::where('c_estado', $cp->c_estado)->first();
            $municipio = SepomexMunicipios::where('c_mnpio', $cp->c_mnpio)->where('c_estado', $estado->c_estado)->first();
    
            // Se retorna la con todos los datos que se pintarán en la vista en caso de que ya hayan sido capturados
            return view('alumno.contacto', compact('alumno', 'user', 'domicilio', 'estado', 'municipio'));
        } else {
            return redirect()->route('alumno.show', compact('id'))->with('message', 'No hay una dirección registrada');
        }
    }
}
