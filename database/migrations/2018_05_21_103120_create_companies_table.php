<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('city')->nullable();
            $table->string('state_or_region')->nullable();
            $table->string('address')->nullable();
            $table->integer('industry')->unsigned()->nullable();
            $table->integer('type')->unsigned()->nullable();
            $table->string('website_link')->nullable();
            $table->string('profile_doc_url')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('phone_ext')->nullable();
            $table->string('phone_num')->nullable();
            $table->string('email')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
