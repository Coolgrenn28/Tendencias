<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    protected $table = 'productos';
 use HasFactory;
    protected $fillable = [
        'nombre',
        'precio',
        'estado',
        'registradopor'
    ];

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class);
    }
}