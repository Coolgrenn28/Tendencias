<?php

namespace Database\Factories;

use App\Models\EstadoPedido;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EstadoPedido>
 */
class EstadoPedidoFactory extends Factory
{
    protected $model = EstadoPedido::class;

    public function definition(): array
    {
        return [
            'nombre_estado' => $this->faker->randomElement([
                'Pedido recibido',
                'En preparación',
                'Enviado',
                'En camino',
                'Entregado',
            ]),
            'estado' => 'activo',
            'registradopor' => 'sistema',
        ];
    }
}
