<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id('acm_id');
            $table->string('acm_title');
            $table->bigInteger('acm_user_id')->unsigned();
            $table->text('acm_description');
            $table->string('acm_slug');
            $table->string('acm_upload_type');
            $table->timestamp('acm_date')->nullable();
            $table->boolean('acm_is_active');
            
            $table->bigInteger('acm_created_by')->unsigned()->nullable();
            $table->bigInteger('acm_updated_by')->unsigned()->nullable();
            $table->bigInteger('acm_deleted_by')->unsigned()->nullable();

            $table->foreign('acm_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('acm_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('acm_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('acm_user_id')->references('usr_id')->on('users')->onDelete('cascade');
            
            $table->timestamp('acm_created_at')->nullable();
            $table->timestamp('acm_updated_at')->nullable();
            $table->timestamp('acm_deleted_at')->nullable();
            $table->string('acm_sys_note')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
