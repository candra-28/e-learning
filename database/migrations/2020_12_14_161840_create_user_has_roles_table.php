<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHasRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_has_roles', function (Blueprint $table) {
            $table->id('uhs_id');
            $table->bigInteger('uhs_user_id')->unsigned();
            $table->bigInteger('uhs_role_id')->unsigned();
            
            $table->bigInteger('uhs_created_by')->unsigned()->nullable();
            $table->bigInteger('uhs_updated_by')->unsigned()->nullable();
            $table->bigInteger('uhs_deleted_by')->unsigned()->nullable();

            $table->foreign('uhs_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('uhs_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('uhs_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');

            $table->foreign('uhs_user_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('uhs_role_id')->references('rol_id')->on('roles')->onDelete('cascade');
            
            
            $table->timestamp('uhs_created_at')->nullable();
            $table->timestamp('uhs_updated_at')->nullable();
            $table->timestamp('uhs_deleted_at')->nullable();
            $table->string('uhs_sys_note')->nullable();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_has_roles');
    }
}
