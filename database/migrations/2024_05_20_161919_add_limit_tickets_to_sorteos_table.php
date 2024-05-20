<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('Sorteos', function (Blueprint $table) {
            $table->integer('limit_tickets')->default(0); // Puedes ajustar el tipo de dato y el valor por defecto según tus necesidades
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Sorteos', function (Blueprint $table) {
            $table->dropColumn('limit_tickets');
        });
    }
};
