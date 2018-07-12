<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessFormStepAllocationTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('process_form_step_allocation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('process_form_id')->unsigned();
            $table->integer('step_id')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('process_form_step_allocation');
    }
}
