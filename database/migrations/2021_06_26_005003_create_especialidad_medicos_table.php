<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidad_medicos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('especialidad_id');

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
        Schema::dropIfExists('especialidad_medicos');
    }
}
