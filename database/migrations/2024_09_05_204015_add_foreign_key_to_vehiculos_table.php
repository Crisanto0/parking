<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToVehiculosTable extends Migration
{
    public function up()
    {
        Schema::table('vehiculos', function (Blueprint $table) {
            // Asegúrate de que la columna propietario_id exista
            $table->unsignedBigInteger('propietario_id')->change(); // Si es necesario, añade el campo si no está

            // Restaurar la clave foránea
            $table->foreign('propietario_id')->references('propietario_id')->on('propietarios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('vehiculos', function (Blueprint $table) {
            // Eliminar la clave foránea si haces un rollback
            $table->dropForeign(['propietario_id']);
        });
    }
}

