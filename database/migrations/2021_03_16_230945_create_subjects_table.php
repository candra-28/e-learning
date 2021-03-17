<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id('sbj_id');
            $table->string('sbj_name');
            $table->boolean('sbj_is_active');
            
            $table->bigInteger('sbj_created_by')->unsigned()->nullable();
            $table->bigInteger('sbj_updated_by')->unsigned()->nullable();
            $table->bigInteger('sbj_deleted_by')->unsigned()->nullable();

            $table->foreign('sbj_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('sbj_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('sbj_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            
            $table->timestamp('sbj_created_at')->nullable();
            $table->timestamp('sbj_updated_at')->nullable();
            $table->timestamp('sbj_deleted_at')->nullable();
            $table->string('sbj_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
