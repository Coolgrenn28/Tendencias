<?php



namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cliente>
 */
class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'correo' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->phoneNumber(), // 🔥 nuevo
            'direccion' => $this->faker->address(),    // 🔥 nuevo
            'estado' => 'activo',
            'registradopor' => 'sistema',
        ];
    }
}