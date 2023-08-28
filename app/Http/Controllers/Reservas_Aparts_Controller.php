<?php

namespace App\Http\Controllers;

use App\Models\ReservasAparts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importa la clase DB
use Carbon\Carbon;

class Reservas_Aparts_Controller extends Controller
{


   // ... Otras funciones del controlador ...

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
        //eventos reales
         // Obtener los datos de las reservas desde el procedimiento almacenado
         $reservas = DB::select('CALL ObtenerReservas()');
     
         $colores = [
            'Disponible' => '#379A62',//aprobada - vede
            'Anulada' => '#CB5B45', //anulada - rojo
            'Reservada' => '#EDC758', //reservada - amarillo
            'Aprobada' => '#379A62',//aprobada - vede
            'Utilizada' => '#379A62', // utilizada - azul
             
         ];
     
         $eventos = [];
         foreach ($reservas as $reserva) {
             $color = isset($colores[$reserva->Estado]) ? $colores[$reserva->Estado] : 'gray';
             $clienteNombre = $reserva->Cliente;
             $datosCliente = $reserva->Cliente.' - '. $reserva->apellido.' - '.$reserva->telefono;
             $tituloEvento = $reserva->id_apart.' - '. $clienteNombre . ' - ' . $reserva->Apart . ' - ' . $reserva->id_apart; // Concatenar nombre de cliente y cabaña
             $datosAparts = $reserva->id_apart.' - '. $reserva->Apart;

             $eventos[] = [
                 'id' => $reserva->id,
                 'idApart'=>$reserva->id_apart,
                 'bdDataApart'=>$datosAparts,
                 'idCliente' => $datosCliente,
                 'title' => $tituloEvento,
                'bdComentario' =>$reserva->Comentario,
                 'start' => $reserva->fecha_desde,
                 'end' => $reserva->fecha_hasta,
                 'bdTotal'=> $reserva->costo_total,
                 'bdPago'=>$reserva->pago,
                 'bdDebe'=>$reserva->debe,
                 'allDay' => true,
                 'color' => $color,
                 'bdEstado' => $reserva->Estado,
                 // Agregar más propiedades si es necesario según los campos de tu modelo
             ];
         }
         // Generar eventos falsos
         $eventosFalsos = $this->generarEventosFalsos();

           // Combinar eventos reales y falsos
            $eventos = array_merge($eventos, $eventosFalsos);

            // Ordenar los eventos por idApart
            usort($eventos, function ($a, $b) {
                return $b['idApart'] - $a['idApart'];
            });
         return response()->json($eventos);
       }

       
       private function generarEventosFalsos()
       {
                            // Obtener los datos de las reservas desde el procedimiento almacenado
                            $reservas = DB::select('CALL ObtenerReservas()');

                            $colores = [
                                'Disponible' => '#379A62',
                                'Anulada' => '#CB5B45',
                                'Reservada' => '#EDC758',
                                'Aprobada' => '#379A62',
                                'Utilizada' => '#007BFF',
                            ];
                        
                            $eventos = [];
                            $apartamentosUsados = [];
                            foreach ($reservas as $reserva) {
                                $color = isset($colores[$reserva->Estado]) ? $colores[$reserva->Estado] : 'gray';
                                $clienteNombre = $reserva->Cliente;
                                $datosCliente = $reserva->Cliente . ' - ' . $reserva->apellido . ' - ' . $reserva->telefono;
                                $tituloEvento = $reserva->id_apart . ' - ' . $clienteNombre . ' - ' . $reserva->Apart . ' - ' . $reserva->id_apart;
                                $datosAparts = $reserva->id_apart . ' - ' . $reserva->Apart;

                                // Calcula la duración en días del evento
                                $inicio = Carbon::parse($reserva->fecha_desde);
                                $fin = Carbon::parse($reserva->fecha_hasta);
                                $duracionEnDias = $inicio->diffInDays($fin);

                                for ($i = 0; $i <= $duracionEnDias; $i++) {
                                    $eventos[] = [
                                        'id' => $reserva->id,
                                        'idApart' => $reserva->id_apart,
                                        'bdDataApart' => $datosAparts,
                                        'idCliente' => $datosCliente,
                                        'title' => $tituloEvento,
                                        'bdComentario' => $reserva->Comentario,
                                        'start' => $inicio->format('Y-m-d'),
                                        'end' => $inicio->format('Y-m-d'),
                                        'bdTotal' => $reserva->costo_total,
                                        'bdPago' => $reserva->pago,
                                        'bdDebe' => $reserva->debe,
                                        'allDay' => true,
                                        'color' => $color,
                                        'bdEstado' => $reserva->Estado,
                                    ];

                                    // Agregar el ID del apartamento usado a la lista de apartamentos usados en esa fecha
                                    if (!isset($apartamentosUsados[$inicio->format('Y-m-d')])) {
                                        $apartamentosUsados[$inicio->format('Y-m-d')] = [];
                                    }
                                    $apartamentosUsados[$inicio->format('Y-m-d')][] = $reserva->id_apart;

                                    $inicio->addDay(); // Avanza un día
                                }
                            }
                        
                            $fechaInicio = Carbon::now();
                            $fechaFin = $fechaInicio->copy()->addMonths(4);
                        
                            while ($fechaInicio->lessThanOrEqualTo($fechaFin)) {
                                // Obtén la fecha actual en formato Y-m-d
                                $fechaActual = $fechaInicio->format('Y-m-d');
                        
                                // Obtén los apartamentos usados en esta fecha (si hay eventos reales)
                                $apartamentosEnUso = isset($apartamentosUsados[$fechaActual]) ? $apartamentosUsados[$fechaActual] : [];
                        
                                // Encuentra los apartamentos libres para esta fecha
                                $apartamentosLibres = array_diff(range(1, 7), $apartamentosEnUso);
                        
                                // Crea eventos falsos para los apartamentos libres en esta fecha
                                foreach ($apartamentosLibres as $apartamentoLibre) {
                                    $eventosFalsos[] = [
                                        'id' => 'x',
                                        'idApart' => $apartamentoLibre,
                                        'bdDataApart' => '',
                                        'idCliente' => 'Buscar',
                                        'title' => $apartamentoLibre . ' - ' . 'Libre',
                                        'bdComentario' => '',
                                        'start' => $fechaActual,
                                        'end' => $fechaActual,
                                        'bdTotal' => '',
                                        'bdPago' => '',
                                        'bdDebe' => '',
                                        'allDay' => true,
                                        'color' => '#808080',
                                        'bdEstado' => 'Libre',
                                    ];
                                }
                        
                                // Avanza un día
                                $fechaInicio->addDay();
                            }
                            
                            // Ordena los eventos por idApart
                            usort($eventos, function ($a, $b) {
                                return $a['idApart'] - $b['idApart'];
                            });
                        
                            return $eventosFalsos;

       }






       
       public function actualizarReserva(Request $request) {
 
        
              // Obtén los datos del formulario
              $id = $request->input('id');
              $nombreApart = $request->input('lbNombreApart');
              $EstadoReservaApart = $request->input('lbEstadoReserva');
              $desde = $request->input('DTPdesde');
              $hasta = $request->input('DTPhasta');
              $total = $request->input('tbTotal');
              $pago = $request->input('tbPagado');
              $debe = $request->input('tbDebe');
              $comentario =$request->input('tbComentario');
    
        // Mapear los valores de $EstadoReservaApart a 1, 2, 3, 4, 5
        if ($EstadoReservaApart === 'Disponible') {
            $EstadoReservaApart = 1;
        } elseif ($EstadoReservaApart === 'Anulada') {
            $EstadoReservaApart = 2;
        } elseif ($EstadoReservaApart === 'Reservada') {
            $EstadoReservaApart = 3;
        } elseif ($EstadoReservaApart === 'Aprobada') {
            $EstadoReservaApart = 4;
        } elseif ($EstadoReservaApart === 'Utilizada') {
            $EstadoReservaApart = 5;
        }
            
                // Mapear los valores de $nombreApart a 1, 2, 3, 4, 5, 6, 7
        switch ($nombreApart) {
            case '1 - Initi':
                $nombreApart = 1;
                break;
            case '2 - Quiya':
                $nombreApart = 2;
                break;
            case '3 - Wasi':
                $nombreApart = 3;
                break;
            case '4 - Lawen':
                $nombreApart = 4;
                break;
            case '5 - Conalara':
                $nombreApart = 5;
                break;
            case '6 - Naguan':
                $nombreApart = 6;
                break;
            case '7 - Cabaña':
                $nombreApart = 7;
                break;
            default:
                $nombreApart = 2;
                break;
}


            $desde = Carbon::createFromFormat('d/m/Y', $desde)->format('Y-m-d');
            $hasta = Carbon::createFromFormat('d/m/Y', $hasta)->format('Y-m-d');


    

       // Llama al procedimiento almacenado
       DB::statement("CALL actualizarReserva(?, ?, ?, ?, ?, ?, ?, ?, ?)",
       [$id, $nombreApart, $EstadoReservaApart, $desde, $hasta, $total, $pago, $debe, $comentario]);


        // Después de actualizar, redirige a la vista 'dash.php' con un mensaje de éxito
        return redirect()->route('dashboard')->with('success', 'Reserva actualizada con éxito');
    }



    


     public function edit($id)
     {
        $reserva = ReservasAparts::findOrFail($id);
       
        return view('reservas_aparts.edit', compact('reserva'));
     }




     
    

    
    
       
     
  

}

