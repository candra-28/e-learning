<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('stu_id');
            $table->bigInteger('stu_user_id')->unsigned();
            $table->integer('stu_nis')->unique();
            $table->boolean('stu_is_active');
            $table->bigInteger('stu_school_year_id')->unsigned();

            $table->foreign('stu_user_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('stu_school_year_id')->references('scy_id')->on('school_years')->onDelete('cascade');

            $table->bigInteger('stu_created_by')->unsigned()->nullable();
            $table->bigInteger('stu_updated_by')->unsigned()->nullable();
            $table->bigInteger('stu_deleted_by')->unsigned()->nullable();

            $table->foreign('stu_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('stu_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('stu_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            
            $table->timestamp('stu_created_at')->nullable();
            $table->timestamp('stu_updated_at')->nullable();
            $table->timestamp('stu_deleted_at')->nullable();
            $table->string('stu_sys_note')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
