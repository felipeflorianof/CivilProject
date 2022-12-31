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
        DB::unprepared('
            CREATE TRIGGER `AtualizaEstoque` AFTER INSERT ON `applicants`
            FOR EACH ROW
            update materials set quantidade = quantidade - new.quantidade where materials.id = new.materials_id;
          ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `AtualizaEstoque`');
    }
};
