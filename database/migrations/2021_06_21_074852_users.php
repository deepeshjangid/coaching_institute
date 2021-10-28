<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('email',100)->unique()->nullable();
            $table->string('mobile',100)->unique();
            $table->enum('user_type', ['1', '2', '3', '4'])->comment('1=>student, 2=>teacher, 3=>institute, 4=>admin')->default('1');
            $table->enum('admin_verify', ['0', '1'])->default('0');
            $table->enum('status', ['0', '1'])->default('0');
            $table->enum('delete_status', ['0', '1'])->default('1');
            $table->string('password',100);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        $pass = Hash::make('admin');
        DB::table('users')->insert(array(
            array(
                "name"=>'admin',
                "email"=>'admin@gmail.com',
                "mobile"=>'9988552266',
                "status"=>'1',
                "user_type"=>'4',
                "password"=>$pass ),
            
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
