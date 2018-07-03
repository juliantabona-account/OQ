<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('bio')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_ext')->nullable();
            $table->string('phone_num')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('status')->default(0);
            $table->string('verifyToken')->nullable();
            $table->text('settings')->nullable();
            $table->text('tutorial_status')->nullable();
            $table->integer('company_branch_id')->unsigned()->nullable();
            $table->string('position')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
