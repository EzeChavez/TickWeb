<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clientes;
use App\Models\Apart;
use App\Models\estados_aparts;
use App\Models\estados_reservas_aparts;
use App\Models\ReservasAparts;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    Clientes::factory(50)->create();

    Apart::create([
        'numero' => 1,
        'nombre' => 'Inti',
        'capacidad' => 2,
        'estado_apart' => 'funcional',
    ]);

    Apart::create([
        'numero' => 2,
        'nombre' => 'Quiya',
        'capacidad' => 2,
        'estado_apart' => 'funcional',
    ]);
    Apart::create([
        'numero' => 3,
        'nombre' => 'Wasi',
        'capacidad' => 2,
        'estado_apart' => 'funcional',
    ]);
    Apart::create([
        'numero' => 4,
        'nombre' => 'Lawen',
        'capacidad' => 2,
        'estado_apart' => 'funcional',
    ]);
    Apart::create([
        'numero' => 5,
        'nombre' => 'Conalara',
        'capacidad' => 2,
        'estado_apart' => 'funcional',
    ]);
    Apart::create([
        'numero' => 6,
        'nombre' => 'Naguan',
        'capacidad' => 2,
        'estado_apart' => 'funcional',
    ]);
    Apart::create([
        'numero' => 7,
        'nombre' => 'Cabaña_La_Amistad',
        'capacidad' => 2,
        'estado_apart' => 'funcional',
    ]);

    estados_reservas_aparts::create([
        'nombre' => 'Disponible',
        'detalle' => 'Disponible para alquilar',
    ]);
    estados_reservas_aparts::create([
        'nombre' => 'Anulada',
        'detalle' => 'Anulada por el Administrador',
    ]);
    estados_reservas_aparts::create([
        'nombre' => 'Reservada',
        'detalle' => 'Esperando aprobación o anulación ',
    ]);
    estados_reservas_aparts::create([
        'nombre' => 'Aprobada',
        'detalle' => 'Pago confirmado, esperando al check-in',
    ]);
    estados_reservas_aparts::create([
        'nombre' => 'Vencida',
        'detalle' => 'El cliente no se presento, el periodo pasa a estar disponible',
    ]);
    estados_aparts::create([
        'nombre' => 'Funcional',
        'detalle' => 'Listo para ser alquilado',
    ]);
    estados_aparts::create([
        'nombre' => 'Inactivo',
        'detalle' => 'No disponible por algún problema',
    ]);

    ReservasAparts::factory(50)->create();

    }
   
}
