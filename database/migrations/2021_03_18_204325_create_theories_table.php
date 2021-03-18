<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTheoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theories', function (Blueprint $table) {
            $table->id('thr_id');
            $table->string('thr_title');
            $table->text('thr_description');
            $table->timestamp('thr_deadline');
            $table->bigInteger('thr_class_id')->unsigned();
            $table->bigInteger('thr_teacher_id')->unsigned();
            $table->timestamp('thr_date')->nullable();

            $table->bigInteger('thr_created_by')->unsigned()->nullable();
            $table->bigInteger('thr_updated_by')->unsigned()->nullable();
            $table->bigInteger('thr_deleted_by')->unsigned()->nullable();

            $table->foreign('thr_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('thr_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('thr_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('thr_teacher_id')->references('tcr_id')->on('teachers')->onDelete('cascade');
            $table->foreign('thr_class_id')->references('cls_id')->on('classes')->onDelete('cascade');

            $table->timestamp('thr_created_at')->nullable();
            $table->timestamp('thr_updated_at')->nullable();
            $table->timestamp('thr_deleted_at')->nullable();
            $table->string('thr_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theories');
    }
}
