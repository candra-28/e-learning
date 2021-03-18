<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('not_id');
            $table->bigInteger('not_to_role_id')->unsigned();
            $table->string('not_title');
            $table->text('not_message');
            $table->timestamp('not_date')->nullable();

            $table->bigInteger('not_created_by')->unsigned()->nullable();
            $table->bigInteger('not_updated_by')->unsigned()->nullable();
            $table->bigInteger('not_deleted_by')->unsigned()->nullable();

            $table->foreign('not_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('not_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('not_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('not_to_role_id')->references('rol_id')->on('roles')->onDelete('cascade');

            $table->timestamp('not_created_at')->nullable();
            $table->timestamp('not_updated_at')->nullable();
            $table->timestamp('not_deleted_at')->nullable();
            $table->string('not_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
