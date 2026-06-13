<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('encomendas', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 255);
            $table->decimal('peso', 5, 2);
            $table->string('status');
            $table->date('data_envio');
            $table->date('data_entregar')->nullable();

            $table->foreignId('id_remetentes')->constrained('remetentes');
            $table->foreignId('id_destinatarios')->constrained('destinatarios');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encomendas');
    }
};