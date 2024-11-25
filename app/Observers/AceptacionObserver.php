<?php

namespace App\Observers;

use App\Models\Sadce\Aceptacion;
use App\Models\Sadce\SolicitudesAspirante;
use App\Models\Sadce\Aspirante;


use App\Models\Alumno\Alumnos;

class AceptacionObserver
{
    /**
     * Handle the Aceptacion "created" event.
     *
     * @param  \App\Models\Sadce\Aceptacion  $aceptacion
     * @return void
     */
    public function created(Aceptacion $aceptacion)
    {
        //
        $solicitud = $aceptacion->solicitud_id;

        if ($solicitud && $solicitud->aspirante_id){
            $aspirante = Aspirante::find($solicitud->aspirante_id);

            if($aspirante){
                $aspiranteData = $aspirante->toArray();

                // Eliminar el campo ID si lo tiene, ya que normalmente los IDs son autoincrementales en la tabla destino
                unset($aspiranteData['id']);  // Evitar que el ID se duplique

                // Duplicar el registro en TablaB (Base de Datos B)
                Alumnos::create($aspiranteData); // Crear un nuevo registro en TablaB con todos los campos
            }

        }
    }

    /**
     * Handle the Aceptacion "updated" event.
     *
     * @param  \App\Models\Sadce\Aceptacion  $aceptacion
     * @return void
     */
    public function updated(Aceptacion $aceptacion)
    {
        //
    }

    /**
     * Handle the Aceptacion "deleted" event.
     *
     * @param  \App\Models\Sadce\Aceptacion  $aceptacion
     * @return void
     */
    public function deleted(Aceptacion $aceptacion)
    {
        //
    }

    /**
     * Handle the Aceptacion "restored" event.
     *
     * @param  \App\Models\Sadce\Aceptacion  $aceptacion
     * @return void
     */
    public function restored(Aceptacion $aceptacion)
    {
        //
    }

    /**
     * Handle the Aceptacion "force deleted" event.
     *
     * @param  \App\Models\Sadce\Aceptacion  $aceptacion
     * @return void
     */
    public function forceDeleted(Aceptacion $aceptacion)
    {
        //
    }
}
