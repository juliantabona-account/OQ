<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessFormTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('process_form', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('selected')->default(0);
            $table->integer('company_id')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('process_form');
    }
}
