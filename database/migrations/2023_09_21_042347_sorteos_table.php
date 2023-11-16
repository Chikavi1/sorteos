<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('Sorteos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->string('photo4')->nullable();
            $table->string('photo5')->nullable();
            $table->text('description')->nullable();
            $table->integer('tickets');
            $table->timestamp('end_date');
            $table->integer('status');
            $table->string('winner')->nullable();
            $table->double('pricing',8, 2);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('Sorteos');
    }
};
