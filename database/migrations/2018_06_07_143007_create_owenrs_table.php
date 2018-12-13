<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwenrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owenrs', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('tipo-propi');
            $table->string('nombre');
            $table->string('documento')->unique();
            $table->string('celular')->nullable();
            $table->string('mail')->unique()->nullable();
            $table->string('direccion')->nullable();
            $table->string('entries_id');


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
        Schema::dropIfExists('owenrs');
    }
}
