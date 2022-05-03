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
        Schema::create('personas', function (Blueprint $table) {
            $table->id(); // bigInt, autoincremet, llave primary, unsigned
            $table->string("nombres", 50);
            $table->string("apellidos", 50);
            $table->string("ci_nit", 15)->nullable();
            $table->string("direccion")->nullable();
            $table->string("telefono", 15)->nullable();

            // 1:1
            $table->bigInteger("user_id")->unsigned()->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            
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
        Schema::dropIfExists('personas');
    }
};
