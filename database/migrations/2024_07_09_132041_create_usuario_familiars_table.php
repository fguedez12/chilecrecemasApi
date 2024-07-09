<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioFamiliarsTable extends Migration
{
    public function up()
    {
        Schema::create('usuario_familiars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuarioP_id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('edad')->nullable();
            $table->char('sexo', 1)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->integer('semanas_embarazo')->nullable();
            $table->string('parentesco');
            $table->timestamps();

            $table->foreign('usuarioP_id')->references('id')->on('usuarioP')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuario_familiars');
    }
}