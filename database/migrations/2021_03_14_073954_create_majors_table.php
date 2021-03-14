<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majors', function (Blueprint $table) {
            $table->id('mjr_id');
            $table->string('mjr_name');
            $table->text('mjr_description');
            $table->string('mjr_thumnail');
            $table->boolean('mjr_is_active');
            
            $table->bigInteger('mjr_created_by')->unsigned()->nullable();
            $table->bigInteger('mjr_updated_by')->unsigned()->nullable();
            $table->bigInteger('mjr_deleted_by')->unsigned()->nullable();

            $table->foreign('mjr_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('mjr_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('mjr_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            
            $table->timestamp('mjr_created_at')->nullable();
            $table->timestamp('mjr_updated_at')->nullable();
            $table->timestamp('mjr_deleted_at')->nullable();
            $table->string('mjr_sys_note')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('majors');
    }
}
