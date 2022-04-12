<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaPublicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_publicacion', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("persona_id")->unsigned();
            $table->bigInteger("publicacion_id")->unsigned();

            $table->foreign("persona_id")->references("id")->on("personas");
            $table->foreign("publicacion_id")->references("id")->on("publicacions");

            $table->string("documento");
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
        Schema::dropIfExists('persona_publicacion');
    }
}
