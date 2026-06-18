<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Direccion;
use App\Models\Transportista;
use App\Models\Producto;
use App\Models\EstadoPedido;
use App\Models\Pedido;
use App\Models\DetallePedido;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
       
        $estados = [
            'Pedido recibido',
            'En preparación',
            'Enviado',
            'En camino',
            'Entregado'
        ];

        foreach ($estados as $estado) {
            EstadoPedido::create([
                'nombre_estado' => $estado,
                'estado' => 'activo',
                'registradopor' => 'sistema'
            ]);
        }

        // 2. Crear productos
        $productos = Producto::factory()->count(20)->create();

        // 3. Crear transportistas
        $transportistas = Transportista::factory()->count(5)->create();

        // 4. Crear clientes
        $clientes = Cliente::factory()->count(10)->create();

        // 5. Crear direcciones
        $direcciones = Direccion::factory()->count(10)->create();

        // 6. Crear pedidos con detalles
        Pedido::factory()
            ->count(15)
            ->create([
                'cliente_id' => fn() => $clientes->random()->id,
                'direccion_id' => fn() => $direcciones->random()->id,
                'transportista_id' => fn() => $transportistas->random()->id,
                'estado_actual' => fn() => EstadoPedido::inRandomOrder()->first()->id,
            ])
            ->each(function ($pedido) use ($productos) {

                // Cada pedido tendrá entre 1 y 4 productos
                $cantidadProductos = rand(1, 4);

                for ($i = 0; $i < $cantidadProductos; $i++) {
                    DetallePedido::create([
                        'pedido_id' => $pedido->id,
                        'producto_id' => $productos->random()->id,
                        'cantidad' => rand(1, 3),
                        'estado' => 'activo',
                        'registradopor' => 'sistema'
                    ]);
                }
            });
    }
}