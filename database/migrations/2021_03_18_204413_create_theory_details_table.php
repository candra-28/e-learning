<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTheoryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theory_details', function (Blueprint $table) {
            $table->id('thd_id');
            $table->bigInteger('thd_theory_id')->unsigned();
            $table->string('thd_file_upload');

            $table->bigInteger('thd_created_by')->unsigned()->nullable();
            $table->bigInteger('thd_updated_by')->unsigned()->nullable();
            $table->bigInteger('thd_deleted_by')->unsigned()->nullable();

            $table->foreign('thd_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('thd_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('thd_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('thd_theory_id')->references('thr_id')->on('theories')->onDelete('cascade');

            $table->timestamp('thd_created_at')->nullable();
            $table->timestamp('thd_updated_at')->nullable();
            $table->timestamp('thd_deleted_at')->nullable();
            $table->string('thd_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theory_details');
    }
}
