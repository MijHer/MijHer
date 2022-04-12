<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaRubroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_rubro', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("empresa_id")->unsigned();
            $table->bigInteger("rubro_id")->unsigned();

            $table->foreign("empresa_id")->references("id")->on("empresas");
            $table->foreign("rubro_id")->references("id")->on("rubros");
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
        Schema::dropIfExists('empresa_rubro');
    }
}
