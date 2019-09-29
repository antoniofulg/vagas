<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('cargo');
            $table->unsignedSmallInteger('regime')->comment('1 - Estagio, 2 - CLT, 3 - PJ');
            $table->string('formacao');
            $table->longText('atribuicoes');
            $table->longText('requisitos');
            $table->longText('desejavel')->nullable();
            $table->double('remuneracao', 8, 2)->nullable();
            $table->string('beneficios')->nullable();
            $table->string('contato');
            $table->date('data_final')->nullable();
            $table->string('horario');
            $table->string('vagas')->comment('Número de vagas');
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vagas');
    }
}
