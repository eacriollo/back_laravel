<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function pedidos(){

        // se realiza la relacion con la tabla cliente en este caso 1:n
        return $this->hasMany(Pedido::class);
    }
}
