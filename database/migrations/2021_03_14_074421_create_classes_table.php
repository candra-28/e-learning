<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id('cls_id');
            $table->bigInteger('cls_grade_level_id')->unsigned();
            $table->bigInteger('cls_major_id')->unsigned();
            $table->bigInteger('cls_school_year_id')->unsigned();
            $table->integer('cls_number');
            $table->boolean('cls_is_active');

            $table->bigInteger('cls_created_by')->unsigned()->nullable();
            $table->bigInteger('cls_updated_by')->unsigned()->nullable();
            $table->bigInteger('cls_deleted_by')->unsigned()->nullable();

            $table->foreign('cls_grade_level_id')->references('grl_id')->on('grade_levels');
            $table->foreign('cls_major_id')->references('mjr_id')->on('majors');
            $table->foreign('cls_school_year_id')->references('scy_id')->on('school_years');


            $table->foreign('cls_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cls_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cls_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');

            $table->timestamp('cls_created_at')->nullable();
            $table->timestamp('cls_updated_at')->nullable();
            $table->timestamp('cls_deleted_at')->nullable();
            $table->string('cls_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
