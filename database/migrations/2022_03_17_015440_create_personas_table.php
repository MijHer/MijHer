<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string("nombres", 30);
            $table->string("apellidos", 50);
            $table->string("ci_nit", 15)->nullable();
            $table->string("tel_cel", 15)->nullable();
            $table->string("direccion", 200)->nullable();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table){
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->foreign('persona_id')->references('id')->on('personas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
