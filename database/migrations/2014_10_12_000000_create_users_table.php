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
            $table->string('days_attending')->nullable();
            $table->string('event_attending')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('affiliation')->nullable();
            $table->string('position')->nullable();
            $table->string('country')->nullable();
            $table->string('organisation_type')->nullable();   //2
            $table->string('address')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('additional_email')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->string('organisation_affiliation')->nullable();
            $table->string('communication_channel')->nullable();    //2
            $table->string('accessibility')->nullable();
            $table->string('allergies')->nullable();
            $table->string('send_future_updates')->nullable();
            $table->string('send_data_science_journal_updates')->nullable();
            $table->string('agree_to_addon_list')->nullable();
            $table->string('agree_to_details_on_list')->nullable();
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
