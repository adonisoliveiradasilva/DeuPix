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
        //tabela de sorteios
        Schema::create('tbl_sorteios', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->decimal('valor_premio');
            $table->decimal('valor_cota');
            $table->integer('numbers');
            $table->date('data_sorteio')->nullable();
            $table->unsignedBigInteger('winner')->nullable();
            $table->integer('numero_sorteado')->nullable();
            $table->boolean('ativo')->default(true);
            $table->string('description_card');
            $table->longText('description_page');
            $table->string('image_card')->nullable();
            $table->string('image_page')->nullable();
            $table->timestamps();
        });

        Schema::table('tbl_sorteios', function (Blueprint $table) {
            $table->foreign('winner')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
