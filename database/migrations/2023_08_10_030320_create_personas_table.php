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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string("nombres", 50);
            $table->string("apellidos", 50)->nullable();
            $table->string("CI", 13)->nullable();
            $table->string("direccion", 255)->nullable();
            $table->string("telefono", 10)->nullable();
            $table->date("fec_nacimiento")->nullable();

            $table->bigInteger("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
