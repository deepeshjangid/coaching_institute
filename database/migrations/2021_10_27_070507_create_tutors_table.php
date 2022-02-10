<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->longtext('subjects')->nullable();
            $table->string('fee', 100)->nullable();
            $table->string('gender',100)->nullable();
            $table->string('city',100)->nullable();
            $table->string('pincode',100)->nullable();
            $table->longtext('address')->nullable();
            $table->string('highest_qualification',100)->nullable();
            $table->string('highest_qualification_doc',100)->nullable();
            $table->string('profile_image',100)->nullable();
            $table->string('id_proof',100)->nullable();
            $table->string('occupation',100)->nullable();
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
        Schema::dropIfExists('tutors');
    }
}
