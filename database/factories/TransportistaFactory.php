<?php

namespace Database\Factories;

use App\Models\Transportista;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transportista>
 */
class TransportistaFactory extends Factory
{
    protected $model = Transportista::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company(),
            'telefono' => $this->faker->phoneNumber(),
            'estado' => 'activo',
            'registradopor' => 'sistema',
        ];
    }
}