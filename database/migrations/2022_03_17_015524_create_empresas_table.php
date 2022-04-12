<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("sitio_web")->nullable();
            $table->string("direccion")->nullable();
            $table->string("ciudad")->nullable();
            $table->string("pais", 20);
            $table->text("descripcion")->nullable();
            $table->string("telefono")->nullable();
            $table->string("nombre_contacto")->nullable();
            $table->string("logo")->nullable();
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
        Schema::dropIfExists('empresas');
    }
}
