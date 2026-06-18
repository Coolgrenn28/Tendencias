<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('detalle_pedido', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')->constrained('pedidos');
            $table->foreignId('producto_id')->constrained('productos');
            $table->integer('cantidad');

            $table->string('estado')->default('activo');
            $table->string('registradopor');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('detalle_pedido');
    }
};
