<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionAssigmentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_assigment_details', function (Blueprint $table) {
            $table->id('cad_id');
            $table->bigInteger('cad_collection_assigment_id')->unsigned();
            $table->string('cad_file_upload');

            $table->bigInteger('cad_created_by')->unsigned()->nullable();
            $table->bigInteger('cad_updated_by')->unsigned()->nullable();
            $table->bigInteger('cad_deleted_by')->unsigned()->nullable();

            $table->foreign('cad_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cad_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cad_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cad_collection_assigment_id')->references('coa_id')->on('collection_assigments')->onDelete('cascade');

            $table->timestamp('cad_created_at')->nullable();
            $table->timestamp('cad_updated_at')->nullable();
            $table->timestamp('cad_deleted_at')->nullable();
            $table->string('cad_sys_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collection_of_assigment_details');
    }
}
