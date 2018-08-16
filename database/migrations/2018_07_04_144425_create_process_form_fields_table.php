<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessFormFieldsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('process_form_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->boolean('fillable')->default(1);
            $table->boolean('optional')->default(0);
            $table->string('placeholder');
            $table->string('width');
            $table->integer('created_by')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('process_form_fields');
    }
}
