<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContasTable extends Migration
{

    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->string('nome',200);
            $table->integer('tipo');
            $table->double('valor');
            $table->date('data_init');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('contas');
        schema::enableForeignKeyConstraints();
    }
}
