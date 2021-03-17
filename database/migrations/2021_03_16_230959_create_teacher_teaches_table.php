<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTeachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_teaches', function (Blueprint $table) {
            $table->id('tct_id');
            $table->bigInteger('tct_teacher_id')->unsigned();
            $table->bigInteger('tct_class_id')->unsigned();
            $table->bigInteger('tct_subject_id')->unsigned();

            $table->bigInteger('tct_created_by')->unsigned()->nullable();
            $table->bigInteger('tct_updated_by')->unsigned()->nullable();
            $table->bigInteger('tct_deleted_by')->unsigned()->nullable();
            
            $table->foreign('tct_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('tct_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('tct_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('tct_teacher_id')->references('tcr_id')->on('teachers')->onDelete('cascade');
            $table->foreign('tct_class_id')->references('cls_id')->on('classes')->onDelete('cascade');
            $table->foreign('tct_subject_id')->references('sbj_id')->on('subjects')->onDelete('cascade');
            
            $table->timestamp('tct_created_at')->nullable();
            $table->timestamp('tct_updated_at')->nullable();
            $table->timestamp('tct_deleted_at')->nullable();
            $table->string('tct_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_teaches');
    }
}
