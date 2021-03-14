<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_years', function (Blueprint $table) {
            $table->id('scy_id');
            $table->string('scy_name');
            $table->boolean('scy_is_active');
            
            $table->bigInteger('scy_created_by')->unsigned()->nullable();
            $table->bigInteger('scy_updated_by')->unsigned()->nullable();
            $table->bigInteger('scy_deleted_by')->unsigned()->nullable();

            $table->foreign('scy_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('scy_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('scy_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            
            $table->timestamp('scy_created_at')->nullable();
            $table->timestamp('scy_updated_at')->nullable();
            $table->timestamp('scy_deleted_at')->nullable();
            $table->string('scy_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_years');
    }
}
