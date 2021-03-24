<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements("id_transaction");
            $table->integer("id_trx");
            $table->unsignedBigInteger("id_sales");
            $table->unsignedBigInteger("id_division");
            $table->integer("date");
            $table->string("month", 15);
            $table->string("id_area", 10);
            $table->string("product_type", 50);
            $table->string("product_name", 255);
            $table->string("supplier", 100);
            $table->string("status_product", 50);
            $table->string("end_application", 50);
            $table->string("customer", 100);
            $table->integer("qty");
            $table->dateTime("tgl_pengiriman");
            $table->string("note", 255);
            $table->unsignedBigInteger("id_manager")->default(0);
            $table->unsignedBigInteger("status_manager")->default(1);
            $table->timestamps();

            $table->foreign('id_sales')->references('id')->on('users');
            $table->foreign('id_division')->references('id_division')->on('divisions');
            $table->foreign('id_area')->references('id_area')->on('areas');
            $table->foreign('status_manager')->references('id_status')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
