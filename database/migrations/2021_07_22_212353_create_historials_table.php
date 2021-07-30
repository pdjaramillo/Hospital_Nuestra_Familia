<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_historial');
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('especialidad_id');
            $table->text('observaciones');
            $table->text('diagnostico');
            $table->unsignedBigInteger('examen_id');
            $table->unsignedBigInteger('receta_id');

            $table->foreign('paciente_id')
                ->references('id')
                ->on('pacientes')
                ->onDelete('cascade');


            $table->foreign('medico_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('especialidad_id')
                ->references('id')
                ->on('especialidades')
                ->onDelete('cascade');

            $table->foreign('examen_id')
                ->references('id')
                ->on('examens');


            $table->foreign('receta_id')
                ->references('id')
                ->on('recetas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historials');
    }
}
