<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_pedido')->unique();
            $table->dateTime('fecha_pedido');
            $table->dateTime('fecha_estimada_entrega')->nullable();

            $table->foreignId('cliente_id')->constrained('clientes');
            $table->foreignId('direccion_id')->constrained('direcciones');
            $table->foreignId('transportista_id')->constrained('transportistas');
            $table->foreignId('estado_actual')->constrained('estados_pedido');

            $table->string('estado')->default('activo');
            $table->string('registradopor');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('pedidos');
    }
};
