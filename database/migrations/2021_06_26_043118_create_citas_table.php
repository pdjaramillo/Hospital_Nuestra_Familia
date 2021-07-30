<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->datetime('fecha_cita');
            $table->string('estado_cita')->default('Activa');
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('especialidad_id');

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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
