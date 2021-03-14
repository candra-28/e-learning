<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLogHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_log_histories', function (Blueprint $table) {
            $table->id('ulh_id');
            $table->bigInteger('ulh_user_id')->unsigned();
            $table->string('ulh_last_login_ip');
            $table->timestamp('ulh_date');
        
            $table->bigInteger('ulh_created_by')->unsigned()->nullable();
            $table->bigInteger('ulh_updated_by')->unsigned()->nullable();
            $table->bigInteger('ulh_deleted_by')->unsigned()->nullable();

            $table->foreign('ulh_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ulh_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ulh_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            
            $table->timestamp('ulh_created_at')->nullable();
            $table->timestamp('ulh_updated_at')->nullable();
            $table->timestamp('ulh_deleted_at')->nullable();
            $table->string('ulh_sys_note')->nullable();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_log_histories');
    }
}
