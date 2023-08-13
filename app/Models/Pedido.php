<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function productos(){
    /* se realiza la relacion con pedido en este caso N:M teniendo en cuenta la 
        tabla pivod de las dos y colocamos la cantidad que esta en la table pedido_producto se envia como si fuera un array [] */
        return $this->belongsToMany(Producto::class)->withPivot(["cantidad"])->withTimestamps();
    }

    public function cliente(){

        // Relacioncon la tabla cliente en este caso n:1
        return $this->belongsTo(Cliente::class);
    }
}
