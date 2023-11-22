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
        Schema::create('odds', function (Blueprint $table) {
            $table->id();
            $table->string('home_team');
            $table->string('away_team');
            $table->decimal('odds'); // Pode precisar de ajustes dependendo da estrutura dos dados da API
            $table->decimal('odd_visitante');
            $table->timestamp('commence_time');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('odds');
    }
};
