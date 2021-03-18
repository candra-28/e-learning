<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionAssigmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_assigments', function (Blueprint $table) {
            $table->id('coa_id');
            $table->bigInteger('coa_student_id')->unsigned();
            $table->integer('coa_score');
            $table->bigInteger('coa_assigment_id')->unsigned();

            $table->bigInteger('coa_created_by')->unsigned()->nullable();
            $table->bigInteger('coa_updated_by')->unsigned()->nullable();
            $table->bigInteger('coa_deleted_by')->unsigned()->nullable();

            $table->foreign('coa_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('coa_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('coa_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('coa_student_id')->references('stu_id')->on('students')->onDelete('cascade');
            $table->foreign('coa_assigment_id')->references('ass_id')->on('assigments')->onDelete('cascade');


            $table->timestamp('coa_created_at')->nullable();
            $table->timestamp('coa_updated_at')->nullable();
            $table->timestamp('coa_deleted_at')->nullable();
            $table->string('coa_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_of_assigments');
    }
}
