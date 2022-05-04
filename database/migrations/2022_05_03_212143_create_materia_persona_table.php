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
        Schema::create('materia_persona', function (Blueprint $table) {
            $table->id();

            $table->integer("nota")->nullable()->default(null);
            $table->string("rol", 30)->nullable();

            $table->bigInteger("materia_id")->unsigned();
            $table->bigInteger("persona_id")->unsigned();
            $table->bigInteger("gestion_id")->unsigned();

            $table->foreign("materia_id")->references("id")->on("materias");
            $table->foreign("persona_id")->references("id")->on("personas");
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
        Schema::dropIfExists('materia_persona');
    }
};
