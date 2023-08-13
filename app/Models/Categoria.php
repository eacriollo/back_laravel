<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public function productos(){

            // se realiza la relacion de categorias con productos en este caso 1:N
        return $this->hasMany(Producto::class);
    }
}
