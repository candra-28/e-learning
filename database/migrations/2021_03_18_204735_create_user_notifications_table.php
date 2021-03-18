<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_notifications', function (Blueprint $table) {
            $table->id('usn_id');
            $table->bigInteger('usn_user_id')->unsigned();
            $table->bigInteger('usn_notification_id')->unsigned();
            $table->tinyInteger('usn_is_read');

            $table->bigInteger('usn_created_by')->unsigned()->nullable();
            $table->bigInteger('usn_updated_by')->unsigned()->nullable();
            $table->bigInteger('usn_deleted_by')->unsigned()->nullable();

            $table->foreign('usn_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('usn_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('usn_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('usn_user_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('usn_notification_id')->references('not_id')->on('notifications')->onDelete('cascade');

            $table->timestamp('usn_created_at')->nullable();
            $table->timestamp('usn_updated_at')->nullable();
            $table->timestamp('usn_deleted_at')->nullable();
            $table->string('usn_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_notifications');
    }
}
