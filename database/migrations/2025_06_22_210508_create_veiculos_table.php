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
    public function up(): void
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa', 8)->unique(); // placa geralmente é única
            $table->string('renavam', 11)->unique(); // renavam é único também
            $table->string('marca');
            $table->string('modelo');
            $table->year('ano');
            $table->string('cor');
            $table->enum('status', ['Disponível', 'Em manutenção', 'Em uso'])->default('Disponível');
            $table->string('chassi', 17)->unique();
            $table->enum('combustivel', ['Gasolina', 'Etanol', 'Flex', 'Diesel', 'GNV', 'Elétrico', 'Híbrido']);
            $table->text('observacoes')->nullable();
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
};
