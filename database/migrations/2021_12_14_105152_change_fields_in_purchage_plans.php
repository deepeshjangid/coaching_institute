<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldsInPurchagePlans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchage_plans', function (Blueprint $table) {
            $table->string('name',100)->nullable()->change();
            $table->string('mobile',100)->nullable()->change();
            $table->longtext('services')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchage_plans', function (Blueprint $table) {
            //
        });
    }
}
