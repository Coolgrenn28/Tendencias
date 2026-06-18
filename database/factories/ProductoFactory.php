<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Producto>
 */
class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'precio' => $this->faker->randomFloat(2, 10, 500),
            'estado' => 'activo',
            'registradopor' => 'sistema',
        ];
    }
}