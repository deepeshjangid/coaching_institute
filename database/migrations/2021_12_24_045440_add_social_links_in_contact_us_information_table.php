<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialLinksInContactUsInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_us_information', function (Blueprint $table) {
            $table->string('facebook', 200)->nullable()->after('address');
            $table->string('instagram', 200)->nullable()->after('facebook');
            $table->string('twitter', 200)->nullable()->after('instagram');
            $table->string('github', 200)->nullable()->after('twitter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_us_information', function (Blueprint $table) {
            //
        });
    }
}
