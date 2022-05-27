<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{

    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('nome',100);
            $table->integer('idade');
            $table->char('sexo');
            $table->string('tel',15);
            $table->string('tel2',15);
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('pessoas');
        Schema::enableForeignKeyConstraints();
    }
}
