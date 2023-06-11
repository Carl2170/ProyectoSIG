<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edificios', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->unsignedInteger('codEdif');
            $table->decimal('longitud', 12, 7); // 10 dígitos en total, 7 dígitos después del punto decimal
            $table->decimal('latitud', 12, 7); // 10 dígitos en total, 7 dígitos después del punto decimal
            $table->string('grupo');
            $table->string('sigla');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edificios');
    }
};
