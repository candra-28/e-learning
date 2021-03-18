<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssigmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigments', function (Blueprint $table) {
            $table->id('ass_id');
            $table->string('ass_title');
            $table->text('ass_description');
            $table->timestamp('ass_deadline');
            $table->bigInteger('ass_class_id')->unsigned();
            $table->bigInteger('ass_teacher_id')->unsigned();
            $table->timestamp('ass_date')->nullable();

            $table->bigInteger('ass_created_by')->unsigned()->nullable();
            $table->bigInteger('ass_updated_by')->unsigned()->nullable();
            $table->bigInteger('ass_deleted_by')->unsigned()->nullable();

            $table->foreign('ass_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ass_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ass_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ass_teacher_id')->references('tcr_id')->on('teachers')->onDelete('cascade');
            $table->foreign('ass_class_id')->references('cls_id')->on('classes')->onDelete('cascade');

            $table->timestamp('ass_created_at')->nullable();
            $table->timestamp('ass_updated_at')->nullable();
            $table->timestamp('ass_deleted_at')->nullable();
            $table->string('ass_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigments');
    }
}
