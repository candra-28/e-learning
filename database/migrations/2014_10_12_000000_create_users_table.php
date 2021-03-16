<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('usr_id');
            $table->string('usr_name');
            $table->string('usr_email')->unique();
            $table->string('usr_phone_number');
            $table->string('usr_password');
            $table->integer('usr_code_otp')->nullable();
            $table->timestamp('usr_otp_verified_at')->nullable();
            $table->timestamp('usr_start_otp')->nullable();
            $table->string('usr_remember_token')->nullable();
            $table->string('usr_gender')->nullable();
            $table->string('usr_profile_picture')->nullable();
            $table->string('usr_place_of_birth')->nullable();
            $table->date('usr_date_of_birth')->nullable();
            $table->string('usr_religion')->nullable();
            $table->text('usr_address')->nullable();
            $table->boolean('usr_is_active');

            $table->bigInteger('usr_created_by')->unsigned()->nullable();
            $table->bigInteger('usr_updated_by')->unsigned()->nullable();
            $table->bigInteger('usr_deleted_by')->unsigned()->nullable();

            $table->foreign('usr_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('usr_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('usr_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            
            $table->timestamp('usr_created_at')->nullable();
            $table->timestamp('usr_updated_at')->nullable();
            $table->timestamp('usr_deleted_at')->nullable();
            $table->string('usr_sys_note')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
