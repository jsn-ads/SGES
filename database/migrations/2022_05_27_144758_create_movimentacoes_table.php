<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentacoesTable extends Migration
{

    public function up()
    {
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_conta');
            $table->date('data');
            $table->double('valor');
            $table->integer('tipo');
            $table->string('descricao',250);
            $table->foreign('id_conta')->references('id')->on('contas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('movimentacoes');
        Schema::enableForeignKeyConstraints();
    }
}
