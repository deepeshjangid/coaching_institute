<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeFieldInApplyTuitonPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apply_tuiton_payments', function (Blueprint $table) {
            $table->enum('type', ['0', '1'])->comment('0=>Query, 1=>Payment')->default('0')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apply_tuiton_payments', function (Blueprint $table) {
            //
        });
    }
}
