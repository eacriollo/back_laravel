<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // pk , AI, BigInt, unsigned
            $table->string("nombre", 200);
            $table->decimal("precio", 10,2)->default(0);
            $table->integer("stock")->default(0);
            $table->text("descripcion")->nullable();
            $table->boolean("estado")->default(true);
            $table->string("imagen")->nullable();
            // se realiza la relacion con la tabla categorias
            // llame foranea
            $table->bigInteger("categoria_id")->unsigned();
            $table->foreign("categoria_id")->references("id")->on("categorias");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
