<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Creamos todos los campos requerido de la tabla users
        // Basados en el diagrama MER
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_role')->default(2);
            $table->string('document', 50)->unique();
            $table->string('first_name', 150);
            $table->string('last_name', 150);
            $table->string('email',200)->unique();
            $table->date("birthdate");
            $table->text('password');
            $table->boolean('state')->default(0);
            $table->rememberToken();
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->nullable()->default(DB::raw('NULL on update CURRENT_TIMESTAMP'));
            $table->foreign('id_role')->references('id')->on('roles')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });

        // Iniciamos con los datos iniciales por defecto para el usuario administrador
        DB::table('users')->insert([
            [
                'id_role' => 1,
                'document' => '123456789',
                'first_name' => 'Hadik Andres',
                'last_name' => 'Chavez Villafañe',
                'email' => 'chavezhadik@gmail.com',
                'birthdate' => '1988-01-15',
                'password' => Hash::make('123456'),
                'state' => 1
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
