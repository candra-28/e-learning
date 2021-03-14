<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('rol_id');
            $table->string('rol_name');
            $table->boolean('rol_is_active');

            $table->bigInteger('rol_created_by')->unsigned()->nullable();
            $table->bigInteger('rol_updated_by')->unsigned()->nullable();
            $table->bigInteger('rol_deleted_by')->unsigned()->nullable();

            $table->timestamp('rol_created_at')->nullable();
            $table->timestamp('rol_updated_at')->nullable();
            $table->timestamp('rol_deleted_at')->nullable();
            $table->string('rol_sys_note')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
