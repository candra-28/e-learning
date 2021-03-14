<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_levels', function (Blueprint $table) {
            $table->id('grl_id');
            $table->string('grl_name');
            $table->boolean('grl_is_active');

            $table->bigInteger('grl_created_by')->unsigned()->nullable();
            $table->bigInteger('grl_updated_by')->unsigned()->nullable();
            $table->bigInteger('grl_deleted_by')->unsigned()->nullable();

            $table->foreign('grl_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('grl_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('grl_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            
            $table->timestamp('grl_created_at')->nullable();
            $table->timestamp('grl_updated_at')->nullable();
            $table->timestamp('grl_deleted_at')->nullable();
            $table->string('grl_sys_note')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade_levels');
    }
}
