<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EstadoPedido extends Model
{
    protected $table = 'estados_pedido';
 use HasFactory;
    protected $fillable = [
        'nombre_estado',
        'estado',
        'registradopor'
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'estado_actual');
    }
}
