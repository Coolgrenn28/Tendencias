<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    protected $table = 'pedidos';
 use HasFactory;
    protected $fillable = [
        'numero_pedido',
        'fecha_pedido',
        'fecha_estimada_entrega',
        'cliente_id',
        'direccion_id',
        'transportista_id',
        'estado_actual',
        'estado',
        'registradopor'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function direccion()
    {
        return $this->belongsTo(Direccion::class);
    }

    public function transportista()
    {
        return $this->belongsTo(Transportista::class);
    }

    public function estadoPedido()
    {
        return $this->belongsTo(EstadoPedido::class, 'estado_actual');
    }

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class);
    }
}
