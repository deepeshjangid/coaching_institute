<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyTuitonPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_tuiton_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->enum('status', ['0', '1', '2'])->comment('0=>failed, 1=>success, 2=>pending')->default('0');
            $table->integer('amount');
            $table->string('order_id');
            $table->string('transaction_id')->default(0);
            $table->enum('delete_status', ['0', '1'])->default('1');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apply_tuiton_payments');
    }
}
