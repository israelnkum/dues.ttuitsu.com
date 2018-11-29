<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->nullable();
            $table->decimal('arrears')->nullable();
            $table->string('souvenirTaken')->nullable();
            $table->string('receiptNumber')->nullable();
            $table->string('paymentType')->nullable();
            $table->decimal('amountPaid')->nullable();
            $table->string('currentUser')->nullable();
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
        Schema::dropIfExists('payment_logs');
    }
}
