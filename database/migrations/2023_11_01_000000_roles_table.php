<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Creamos la tabla roles
        // Los roles estan basados en la jerarquia jedi
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('description', 100);
        });
        // Iniciamos con los roles por defecto
        // Master es el usuario Administrador del sistema
        // Padawam es el usuario estandar, quien realiza el registro desde el sistema
        DB::table('roles')->insert([
            ['description' => 'Master'],
            ['description' => 'Padawam']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
