<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('Tickets', function (Blueprint $table) {
            $table->id();
            $table->string('folio');
            $table->string('name');
            $table->string('cellphone');
            $table->integer('id_sorteo');
            $table->string('city');
            $table->integer('status');
            $table->timestamps();
        });

    }


    public function down(): void
    {
        Schema::dropIfExists('Tickets');

    }
};
