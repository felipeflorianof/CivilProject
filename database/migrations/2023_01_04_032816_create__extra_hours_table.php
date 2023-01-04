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
        Schema::create('Extra_Hours', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('funcionario');
            $table->time('Entrada');
            $table->time('Saida');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_extra_hours');
    }
};
