<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssigmentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigment_details', function (Blueprint $table) {
            $table->id('asd_id');
            $table->bigInteger('asd_assigment_id')->unsigned();
            $table->string('asd_file_upload');

            $table->bigInteger('asd_created_by')->unsigned()->nullable();
            $table->bigInteger('asd_updated_by')->unsigned()->nullable();
            $table->bigInteger('asd_deleted_by')->unsigned()->nullable();

            $table->foreign('asd_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('asd_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('asd_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('asd_assigment_id')->references('ass_id')->on('assigments')->onDelete('cascade');

            $table->timestamp('asd_created_at')->nullable();
            $table->timestamp('asd_updated_at')->nullable();
            $table->timestamp('asd_deleted_at')->nullable();
            $table->string('asd_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigment_details');
    }
}
