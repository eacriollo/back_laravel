<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    public function user(){

        // se realiza la realacion con tabla user en este caso 1:1
        return $this->belongsTo(User::class);
    }
}
