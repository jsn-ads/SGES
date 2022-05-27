<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{

    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pessoa');
            $table->string('cep',8);
            $table->string('rua',100);
            $table->string('qd',3);
            $table->string('lt',3);
            $table->string('num',5);
            $table->string('cidade',50);
            $table->string('estado',2);
            $table->foreign('id_pessoa')->references('id')->on('pessoas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('enderecos');
        Schema::enableForeignKeyConstraints();
    }
}
