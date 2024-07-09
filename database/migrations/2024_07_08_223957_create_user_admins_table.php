<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('user_admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('microsoft_id')->unique();
            $table->string('avatar')->nullable();
            $table->string('role'); // Nuevo campo para almacenar el rol
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('user_admins');
    }
};
