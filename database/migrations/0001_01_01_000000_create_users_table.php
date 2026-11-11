
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            // Datos personales
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            // Tipo de usuario
            $table->enum('role', ['student', 'company'])
                  ->default('student');

            // Información adicional
            $table->string('career')->nullable();
            $table->string('phone', 30)->nullable();
            $table->text('bio')->nullable();

            // Verificación y sesiones
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
