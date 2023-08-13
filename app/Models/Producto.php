<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use HasFactory;

    public function categoria(){
        // se realiza la relacion con categorias en este caso N:1
        return $this->BelongsTo(Categoria::class);
    }

    public function pedidos(){

        
        /* se realiza la relacion con pedido en este caso N:M teniendo en cuenta la 
        tabla pivod de las dos y colocamos la cantidad que esta en la table pedido_producto se envia como si fuera un array [] */
        return $this->belongsToMany(Pedido::class)->withPivot(["cantidad"])->withTimestamps();
    }
}
