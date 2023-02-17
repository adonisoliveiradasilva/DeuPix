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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sorteio');
            $table->integer('number');
            $table->unsignedBigInteger('user_id_purchased')->nullable();
            $table->string('id_pix')->nullable();
            $table->date('hora_compra')->nullable();
            $table->decimal('transaction_amount');
            $table->text('qrCode');
            $table->text('qrCodeBase64');
            $table->string('status');
            $table->string('detail');

            $table->timestamps();
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('user_id_purchased')->references('id')->on('users');
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('id_sorteio')->references('id')->on('tbl_sorteios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
};
