<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessFormResponsesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('process_form_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('field_id')->unsigned();
            $table->integer('step_id')->unsigned();
            $table->integer('process_form_id')->unsigned();
            $table->integer('trackable_id')->unsigned();
            $table->string('trackable_type');
            $table->integer('created_by')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('process_form_responses');
    }
}
