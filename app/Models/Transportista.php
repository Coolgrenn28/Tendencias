<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transportista extends Model
{
    protected $table = 'transportistas';
 use HasFactory;
    protected $fillable = [
        'nombre',
        'telefono',
        'estado',
        'registradopor'
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}