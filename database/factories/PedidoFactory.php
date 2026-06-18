<?php

namespace Database\Factories;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Direccion;
use App\Models\Transportista;
use App\Models\EstadoPedido;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pedido>
 */
class PedidoFactory extends Factory
{
    protected $model = Pedido::class;

    public function definition(): array
    {
        return [
            'numero_pedido' => $this->faker->unique()->numerify('PED-#####'),
            'fecha_pedido' => $this->faker->dateTime(),
            'fecha_estimada_entrega' => $this->faker->dateTimeBetween('+1 days', '+7 days'),

            'cliente_id' => Cliente::factory(),
            'direccion_id' => Direccion::factory(),
            'transportista_id' => Transportista::factory(),
            'estado_actual' => EstadoPedido::factory(),

            'estado' => 'activo',
            'registradopor' => 'sistema',
        ];
    }
}
