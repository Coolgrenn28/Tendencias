<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetallePedido extends Model
{
    protected $table = 'detalle_pedido';
 use HasFactory;
    protected $fillable = [
        'pedido_id',
        'producto_id',
        'cantidad',
        'estado',
        'registradopor'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}