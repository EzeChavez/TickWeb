<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ReservasAparts;
use Carbon\Carbon;

class ReservasApartsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReservasAparts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $idApart = $this->faker->numberBetween(1, 7);
        $idCliente = $this->faker->numberBetween(1, 50);
        $idEstadoApart = $this->faker->randomElement([1, 2]);
        $idEstadoReservaApart = $this->faker->randomElement([1, 2, 3, 4, 5]);

        // Generar fechas aleatorias para la reserva (no más de una reserva por cabaña por día)
        $fechaDesde = $this->faker->dateTimeBetween('now', '+30 days');
        $fechaHasta = $this->faker->dateTimeBetween($fechaDesde, $fechaDesde->format('d-m-Y') . ' +5 days');

        return [
            'id_apart' => $idApart,
            'id_cliente' => $idCliente,
            'fecha_desde' => $fechaDesde,
            'fecha_hasta' => $fechaHasta,
            'costo_total' => $this->faker->randomFloat(2, 50, 200),
            'pago' => $this->faker->randomFloat(2, 0, 200),
            'debe' => $this->faker->randomFloat(2, 0, 200),
            'comentario' => $this->faker->sentence,
            'id_estado_apart' => $idEstadoApart,
            'id_estado_reserva_apart' => $idEstadoReservaApart,
            'expires_at' => $fechaHasta,
        ];
    }
    }

