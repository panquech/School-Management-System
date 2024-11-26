<?php

namespace App\Observers;

use App\Models\Sadce\Aceptacion;
use App\Models\Sadce\SolicitudesAspirante;
use App\Models\Sadce\Aspirante;
use App\User;


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
        $solicitud = SolicitudesAspirante::find($aceptacion->solicitud_id);
        //dump($solicitud);
        if ($solicitud){
            $aspirante = Aspirante::find($solicitud->aspirante_id);
            //dump($aspirante);
            // aquí no usamos el modelo User ya que como tiene el mismo nombre que el User del SMS, habría error, en su lugar nos apoyaremos de la relación de los modelos
            $user = $aspirante->user;
            //dump($user);

            if($aspirante){
                $aspiranteData = $aspirante->toArray();
                $userData = $user->toArray();

                // Eliminar el campo ID si lo tiene, ya que normalmente los IDs son autoincrementales en la tabla destino
                unset($userData['id']);  // Evitar que el ID se duplique
                unset($aspiranteData['id']);  // Evitar que el ID se duplique

                // Duplicar el registro en las tablas del SMS
                $createdUser = User::create($userData); // Crear un nuevo registro en Users con todos los campos
                // Esta linea es para decir el user_id NUEVO dentro del SMS
                $aspiranteData['user_id'] = $createdUser->id;
                Alumnos::create($aspiranteData); // Crear un nuevo registro en Alumnos con todos los campos
            }

        }
        dump("Observer ejecutado");
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
