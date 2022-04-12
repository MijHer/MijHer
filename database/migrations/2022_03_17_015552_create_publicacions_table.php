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
            $table->timestamps();
        });
        Schema::table('empresas', function (Blueprint $table){
            $table->unsignedBigInteger('publicacion_id')->nullable();
            $table->foreign('publicacion_id')->references('id')->on('publicacions');
        });
        Schema::table('categorias', function (Blueprint $table){
            $table->unsignedBigInteger('publicacion_id')->nullable();
            $table->foreign('publicacion_id')->references('id')->on('publicacions');
        });
        Schema::table('personas', function (Blueprint $table){
            $table->unsignedBigInteger('publicacion_id')->nullable();
            $table->foreign('publicacion_id')->references('id')->on('publicacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresa', function (Blueprint $table) {
            $table->dropForeign('empresa_publicacion_id_foreign');
            $table->dropColumn('publicacion_id');
        });
        Schema::dropIfExists('publicacions');
    }
}
