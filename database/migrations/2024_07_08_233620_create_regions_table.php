<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('regions', function (Blueprint $table) {
            $table->bigIncrements('id'); // Asegúrate de que esta columna es bigint unsigned
            $table->string('nombre', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('regions');
    }
};
