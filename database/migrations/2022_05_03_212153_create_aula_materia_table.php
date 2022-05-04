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
        Schema::create('aula_materia', function (Blueprint $table) {
            $table->id();

            $table->integer("dia");
            $table->integer("hora_ini");
            $table->integer("hora_fin");

            $table->bigInteger("aula_id")->unsigned();
            $table->bigInteger("materia_id")->unsigned();
            $table->bigInteger("gestion_id")->unsigned();

            $table->foreign("aula_id")->references("id")->on("aulas");
            $table->foreign("materia_id")->references("id")->on("materias");
            $table->foreign("gestion_id")->references("id")->on("gestions");


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
        Schema::dropIfExists('aula_materia');
    }
};
