<?php

namespace Database\Factories;

use App\Models\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Direccion>
 */
class DireccionFactory extends Factory
{
    protected $model = Direccion::class;

    public function definition(): array
    {
        return [
            'direccion' => $this->faker->address(),
            'ciudad' => $this->faker->city(),
            'pais' => $this->faker->country(),
            'estado' => 'activo',
            'registradopor' => 'sistema',
        ];
    }
}