<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned(); 
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->integer('sub_category_id')->unsigned(); 
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('name', 100);
            $table->enum('status', ['0', '1'])->default('1');
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
        Schema::dropIfExists('courses');
    }
}
