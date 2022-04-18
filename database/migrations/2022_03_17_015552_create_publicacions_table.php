<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacions', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->enum('tipo',['tiempo completo', 'medio tiempo', 'temporal' ,'practicante']);
            $table->string('nivel')->nullable();
            $table->text('descripcion');
            $table->text('requerimientos');
            $table->decimal('salario', 10, 2);
            $table->string('ubicacion');
            $table->integer('estado')->default(0);
            $table->bigInteger("empresa_id")->unsigned();
            $table->foreign("empresa_id")->references("id")->on("empresas");
            $table->bigInteger("categoria_id")->unsigned();
            $table->foreign("categoria_id")->references("id")->on("categorias");
            $table->bigInteger("persona_id")->unsigned();
            $table->foreign("persona_id")->references("id")->on("personas");
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
        Schema::dropIfExists('publicacions');
    }
}
