<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * create migration
     * php artisan make:migration create_CivilProject_table
     * 
     * Run the migrations.
     * php artisan migrate
     * @return void
     */
    public function up()
    {
        Schema::create('_civil_project', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 55);
            $table->integer('quantidade');
            $table->string('marca', 55);
            $table->string('complemento', 55);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_civil_project');
    }
};
