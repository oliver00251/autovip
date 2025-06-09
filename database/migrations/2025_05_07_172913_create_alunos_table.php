<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo')->default('Aluno');
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo');
            $table->unsignedBigInteger('permissao')->default(4);
            $table->unsignedInteger('codigo_filial'); 
            $table->string('cpf')->nullable()->unique(); 
            $table->string('nome');
            $table->string('email')->unique();
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
        Schema::dropIfExists('alunos');
    }
};
