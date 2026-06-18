<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Direccion extends Model
{
    protected $table = 'direcciones';
 use HasFactory;
    protected $fillable = [
        'direccion',
        'ciudad',
        'pais',
        'estado',
        'registradopor'
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
