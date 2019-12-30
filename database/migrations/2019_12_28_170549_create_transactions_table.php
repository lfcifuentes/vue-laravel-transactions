<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('type');
            $table->dateTime('date');
            $table->decimal('amount',18,2);
            $table->text('description');

            $table->unsignedBigInteger('cashier_id');
            $table->foreign('cashier_id')->references('id')->on('cashiers');

            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')->references('id')->on('accounts');


            $table->timestamps();
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
